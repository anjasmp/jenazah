<?php

namespace App\Http\Controllers\Member;

use Mail;
use App\Mail\TransactionSuccess;

use App\Http\Controllers\Controller;
use App\Pelayanan;
use App\Service;
use App\Transaction;
use App\UserDetails;
use App\UserFamilies;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        // NOTIFIKASI
        $transaction = Transaction::where([
            'users_id' => Auth::id(),
            'transaction_status' => 'SUCCESS',
        ])->with(['product','user','user_detail.user_families'])->first();
        
        // return $transaction;
        $end_transaction = null;
        
        $masa_aktif = null;

        if ($transaction !== null) {
            $end = Carbon::parse($transaction->masa_aktif);

        
            $now = Carbon::now();

            // Mail::to($transaction->user->email)->send(
            //     new TransactionSuccess($transaction)
            // );
    
            $masa_aktif = $now->diffInDays($end, false);

            

            if ($masa_aktif <= 7) {
                $pending = Transaction::where([
                    'users_id' => Auth::id(),
                    'transaction_status' => 'PENDING',
                    ])->first();
                    
                    // return $pending;
                    if ($pending == null) {
                    if ($transaction->transaction_total >= 265000 ) {
                        $transaction->transaction_total = 250000;
                    }

                    $new_transaction = Transaction::create([
                        'products_id' => $transaction->products_id,
                        'users_id' => Auth::user()->id,
                        'masa_aktif' => Carbon::parse($transaction->masa_aktif)->addYear(1),
                        'register' => 1,
                        'transaction_total' => $transaction->transaction_total,
                        'transaction_status' => 'PENDING'
                    ]);

                    $transaction->user_detail()->update([
                        'transactions_id' => $new_transaction->id,
                    ]);
            
                    // echo $transaction->no_invoice;
                 }
        
            }

            
    

            // return $masa_aktif;

           if ($masa_aktif < 0) {
            $end_transaction = $transaction->update(['transaction_status' => 'FINISHED']);
            $masa_aktif = null;
           }
    
        } else {
            $end_transaction = Transaction::where([
                'users_id' => Auth::id(),
                'transaction_status' => 'FINISHED',
            ])->first();

            // return $end_transaction;

        }

      



        // TOMBOL PELAYANAN
        $items = Transaction::where([
            'users_id' => Auth::id(),
        ])->latest()->first();

        // return $items;



        // GRAFIK INFO
        $anggota = UserFamilies::Where('user_details_id', Auth::id())
            ->where(function ($query) {
                $query->where('userfamily_status', 'ACTIVE');
        })->count();

        $service = Service::Where('transactions_id', Auth::id())
            ->where(function ($query) {
                $query->where('service_status', 'ACCEPTED');
        })->count();

       
        // return $masa_aktif;

        return view('member-area.pelayanan.home',[
            'items' => $items,
            'anggota' => $anggota,
            'service' => $service,
            'masa_aktif' => $masa_aktif,
            'end_transaction' => $end_transaction
        ]);
    }


    public function index()
    {
        
        $transaction = Transaction::where([
            'users_id' => Auth::id(),
            'transaction_status' => 'SUCCESS'
        ])->first();

        if ($transaction == null) {
            $item = array();
        } else {
            $item = Service::with(['transactions','user_families'])->Where('transactions_id', $transaction->id)->get();

        }



        // return $transaction;
      
            
            // return $item;

        return view('member-area.pelayanan.index', compact('item'));
    }
    
    public function service($transaction_id)
    {
        $item = Service::with(['transactions','user_families'])->where('transactions_id', $transaction_id)->get();

        return view('member-area.pelayanan.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_families = UserFamilies::Where('user_details_id', Auth::user()->user_detail->id)
                ->where(function ($query) {
                    $query->where('userfamily_status', '=', 'ACTIVE');
            })
            ->get();

            // return $user_families;

        



        // $user_families = UserFamilies::doesntHave('deleted_at')->get();

        return view('member-area.pelayanan.create', compact('user_families'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_ayah' => 'required|string',
            'tanggal_wafat' => 'required|date|nullable|date_format:Y-m-d',
            'waktu_wafat' => 'date_format:H:i|before:tomorrow',
            'tempat_wafat' => 'required|string',
            'tempat_pemakaman' => 'required|string',
            'kk_atau_ktp'  => 'required|image|max:1000',
            'userfamily_status' => 'string'

        ]);


        $data = $request->all();

        $data['kk_atau_ktp'] = $request->file('kk_atau_ktp')->store(
            'assets/kk_atau_ktp', 'public'
        );        

        $transaction = Transaction::where([
            'users_id' => Auth::id()
        ])->latest()->first();


        UserFamilies::where('id', $data['user_families_id'] )
        ->update(['userfamily_status' => 'PENDING']);


        Service::create([
            'transactions_id' => $transaction->id,
            'user_families_id' => $data['user_families_id'],
            'nama_ayah' => $data['nama_ayah'],
            'tanggal_wafat' => $data['tanggal_wafat'],
            'waktu_wafat' => $data['waktu_wafat'],
            'tempat_wafat' => $data['tempat_wafat'],
            'tempat_pemakaman' => $data['tempat_pemakaman'],
            'kk_atau_ktp' => $data['kk_atau_ktp'],
            'service_status' => 'PROCESS'
        ]);


        return redirect()->back()->with('success','Pengaduan musibah berhasil dibuat, silahkan menunggu dihubungi oleh kami');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Service::with([
            'transactions','user_families'
            ])->findOrFail($id);


        return view('admin.transaction.detail', compact('item'));
        }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
