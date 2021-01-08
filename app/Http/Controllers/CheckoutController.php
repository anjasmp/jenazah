<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionSuccess;
use App\Product;
use App\Transaction;
use App\User;
use App\UserDetails;
use App\UserFamilies;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;

class CheckoutController extends Controller
{

    public function index (Request $request, $id)
    {
        $item = Transaction::with(['user','product'])->findOrFail($id);

        
        return view('user.pelayananjenazah.checkout',[
            'item' => $item
        ]);


    }

    public function process(Request $request, $id)
    {
        $user = Transaction::where('users_id', Auth::user()->id )->with(['transactions' => function($query) use($id){
            $query->where('products_id', $id);
        }])->exists();

        if ($user) {
            return redirect()->back();
        }
        
        $product = Product::findOrFail($id);
        // $user_details = UserDetails::findOrFail($id);
        // $user_families = UserFamilies::findOrFail($id);
        // $transactiondetail = TransactionDetail::all();

        $transaction = Transaction::create([
            'products_id' => $id,
            'users_id' => Auth::user()->id,
            'masa_aktif' => Carbon::now()->addYear(1),
            'register' => 1,
            'transaction_total' => $product->price + $product->register,
            'transaction_status' => 'IN_CART'
        ]);

        

        // UserFamilies::create([
        //     'transactions_id' => $transaction->id,
        //     'name' => Auth::user()->name,
        //     'tempat_lahir' => $user_details->tempat_lahir,
        //     'tanggal_lahir' => $user_details->tanggal_lahir,
        //     'nik' => $user_details->no_kk

        // ]);


        return redirect()->route('product.checkout', $transaction->id);

    }


    public function create (Request $request, $id)
    {
        $this->validate($request, [
            'alamat' => 'required|max:60',
            'telepon' => 'required|string',
            'pekerjaan' => 'string|max:30',
            'no_kk' => 'required|string',
            'scan_ktp' => 'required|image',
            'scan_kk' => 'required|image'

        ]);


        $data = $request->all();

        $data['scan_kk'] = $request->file('scan_kk')->store(
            'assets/scan_kk', 'public'
        );

        $data['scan_ktp'] = $request->file('scan_ktp')->store(
            'assets/scan_ktp', 'public'
        );

        $user_details = UserDetails::create([
            'transactions_id' => $id,
            'alamat' => $data['alamat'],
            'telepon' => $data['telepon'],
            'pekerjaan' => $data['pekerjaan'],
            'no_kk' => $data['no_kk'],
            'scan_kk' => $data['scan_kk'],
            'scan_ktp' => $data['scan_ktp'],
            'users_id' => Auth::id()

        ]);

        echo $user_details->no_anggota;


        return redirect()->route('product.checkoutfamilies', $id);
    }


    public function indexfamilies (Request $request, $id)
    {
        $item = Transaction::with(['user','product','user_detail.user_families'])->findOrFail($id);

        // return $item;
        // $items = UserFamilies::Where('user_details_id', Auth::id())->get();
        
        return view('user.pelayananjenazah.checkout_families',[
            'item' => $item
        ]);


    }
    
    public function createfamilies (Request $request, $id)
    {
        $data = $request->all();

        $this->validate($request, [
            'name' => 'max:30',
            'tempat_lahir' => 'string|max:255',
            'tanggal_lahir' => 'date',
            'nik' => 'string|max:255|unique:user_families,nik'
        ]);



        $details = UserDetails::where([
            'users_id' => Auth::id(),
            'transactions_id' => $id
        ])->first();


        UserFamilies::create([
            'user_details_id' => $details->id,
            'name' => $data['name'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'nik' => $data['nik'],
            'userfamily_status' => 'PENDING'

        ]);


        return redirect()->route('product.checkoutfamilies', $id)->with('success','Data berhasil ditambah');
    }

    public function remove (Request $request, $detail_id)
    {
        $item = UserFamilies::findorfail($detail_id);


        $item->delete();


        return redirect()->back()->with('success','Data berhasil dihapus');
    }




    public function success (Request $request, $id)
    {
        $transaction = Transaction::with(['product','user','user_detail.user_families'])
            ->findOrFail($id);

        $transaction->transaction_status = 'PENDING';

        $transaction->save();
        // $transaction->load(['user']);

        // return $transaction;

        // ini untuk Transfer Manual
        // kirim email keuser
        Mail::to($transaction->user->email)->send(
            new TransactionSuccess($transaction)
        );


        return view('user.pelayananjenazah.success',[
            'transaction' => $transaction
        ]);

      

        // // //set configurasi midtrans
        // Config::$serverKey = config('midtrans.serverKey');
        // Config::$isProduction = config('midtrans.isProduction');
        // Config::$isSanitized = config('midtrans.isSanitized');
        // Config::$is3ds = config('midtrans.is3ds');

        // //buat array dikirim ke midtrans
        // $midtrans_params = [
        //     'transaction_details' => [
        //         'order_id' => 'BAITULHAQ-' . $transaction->id,
        //         'gross_amount' => (int) $transaction->transaction_total
        //     ],
        //     'customer_details' => [
        //         'first_name' => $transaction->userable->name,
        //         'email' => $transaction->userable->email,
        //     ],
        //     'enabled_payments' => ['gopay'], ['echannel'],
        //     'vtweb' => []
        // ];

        // try {
        //     // ambil halaman payment midtrans
        //     $paymentUrl = Snap::createTransactionProduct($midtrans_params)->redirect_url;

        //     // dd($paymentUrl);

        //     //redirect ke halaman midtrans
        //     header('Location: ' . $paymentUrl);

        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }

    }
}