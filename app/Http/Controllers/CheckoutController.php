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
        
        
        $product = Product::findOrFail($id);
        // $user_details = UserDetails::findOrFail($id);
        // $user_families = UserFamilies::findOrFail($id);
        // $transactiondetail = TransactionDetail::all();

        $transaction = Transaction::where([
            'users_id' => Auth::id(),
            'products_id' => $id,
            'transaction_status' => 'IN_CART'
        ])->has('user_detail')->first();
        
        // return $transaction;

        if ($transaction !== null) {
            return redirect()->route('product.checkoutfamilies', $transaction->id);
        } else



        $transaction = Transaction::create([
            'products_id' => $id,
            'users_id' => Auth::user()->id,
            'masa_aktif' => Carbon::now()->addYear(1),
            'register' => 1,
            'transaction_total' => $product->price + $product->register,
            'transaction_status' => 'IN_CART'
        ]);

        echo $transaction->no_invoice;

        return redirect()->route('product.checkout', $transaction->id);

    }


    public function create (Request $request, $id)
    {
        $user = UserDetails::where('users_id', Auth::user()->id )->with(['user_detail' => function($query) use($id){
            $query->where('transactions_id', $id);
        }])->exists();

        if ($user) {
            return redirect()->back()->with('failed','Kamu sudah terdaftar! Kunjungi MEMBER AREA');
        }

        $this->validate($request, [
            'alamat' => 'required|max:255',
            'telepon' => 'required|string',
            'pekerjaan' => 'string|max:30',
            'no_kk' => 'required|string|unique:user_details,no_kk',
            'scan_ktp' => 'required|image|max:1000',
            'scan_kk' => 'required|image|max:1000',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|nullable|date_format:Y-m-d|before:today',
            'nik' => 'required|string|max:255|unique:user_families,nik'

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

        UserFamilies::create([
            'user_details_id' => $user_details->id,
            'name' => Auth::user()->name,
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'nik' => $data['nik'],
            'userfamily_status' => 'PENDING'

        ]);

        echo $user_details->no_anggota;


        return redirect()->route('product.checkoutfamilies', $id)->with('success','Yeay! Berhasil mengisi data diri, selanjutnya lengkapi data anggota keluarga');
    }


    public function indexfamilies (Request $request, $id)
    {
        $item = Transaction::with(['user','product','user_detail.user_families'])->findOrFail($id);

        
        // $anggota = UserFamilies::Where('user_details_id', Auth::id())
        //     ->where(function ($query) {
        //         $query->where('userfamily_status', 'ACTIVE');
        // })->first();
        if ($item->transaction_status == 'CANCEL') {
            abort('404');
        }

     
// return $item;

        return view('user.pelayananjenazah.checkout_families',[
            'item' => $item,
            // 'anggota' => $anggota
        ]);


    }
    
    public function createfamilies (Request $request, $id)
    {

        $data = $request->all();

        $this->validate($request, [
            'name' => 'required|max:255',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|nullable|date_format:Y-m-d|before:today',
            'nik' => 'required|string|max:255|unique:user_families,nik'
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

    public function cancel ($id)
    {
        $item = Transaction::findorfail($id);
        $item->update(['transaction_status' => 'CANCEL']);
        $user_details = UserDetails::where('transactions_id', $id)->first();

        if ($user_details !== null ){
            if ($user_details->user_families !== null) {

                $user_details->user_families()->delete();

                
            }

            $user_details->delete();
        
        }


        return redirect(route('homepage'))->with('success','berhasil dicancel');
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