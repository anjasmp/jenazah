<?php

namespace App\Http\Controllers\Member;

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
        $transaction = Transaction::where([
            'users_id' => Auth::id(),
            'transaction_status' => 'SUCCESS',
        ])->first();
        
        // return $transaction;
        $end_transaction = null;
        
        $masa_aktif = null;

        if ($transaction !== null) {
            $end = Carbon::parse($transaction->masa_aktif);

        
            $now = Carbon::now();
    
            $masa_aktif = $now->diffInDays($end, false);

            // return $masa_aktif;

           if ($masa_aktif < 0) {
            $transaction->update(['transaction_status' => 'ENDED SUBSCRIPTION']);
           }
    
        } else {
            $end_transaction = Transaction::where([
                'users_id' => Auth::id(),
                'transaction_status' => 'ENDED SUBSCRIPTION',
            ])->first();

            // return $end_transaction;

        } 
        










        $user_detail = UserDetails::where([
            'users_id' => Auth::id(),
        ])->first();



        if ($user_detail == null) {

            $item = array();

        } else {

            $item = Transaction::where([
                'transaction_status' => 'PENDING',
            ])->first();


            if ($item == null) {

                $item = array();

            } else {

                $item = Transaction::where([
                    'users_id' => Auth::id(),
                ])->first();
            }
            
        }

        // return $item;


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
            'item' => $item,
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
            'tanggal_wafat' => 'date',
            'waktu_wafat' => 'date_format:H:i',
            'tempat_wafat' => 'required|string',
            'tempat_pemakaman' => 'required|string',
            'kk_atau_ktp'  => 'required|image',
            'userfamily_status' => 'string'

        ]);


        $data = $request->all();

        $data['kk_atau_ktp'] = $request->file('kk_atau_ktp')->store(
            'assets/kk_atau_ktp', 'public'
        );        

        $transaction = Transaction::where([
            'users_id' => Auth::id()
        ])->first();


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
