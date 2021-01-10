<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use PDF;
use App\UserFamilies;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Transaction::with([
            'user','product','user_detail','services'
        ])->Where('users_id', Auth::user()->id)->orderBy('id', 'DESC')->get();


        return view ('member-area.pembayaran.transaksi.index', compact('items'));
    }

    public function cetak_pdf()
    {
        
    }


    public function pay(Request $request, $id)
    {
        $item = Transaction::with(['user','product','user_detail.user_families'])->findOrFail($id);
        
      
        return view('member-area.pembayaran.transaksi.pay',[
            'item' => $item
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Transaction::with([
            'user','product','user_detail'
        ])->Where('users_id', Auth::user()->id)->findorfail($id);

        // return $items;
         set_time_limit (300);
        
        $pdf = PDF::loadView('member-area.pembayaran.transaksi.transaksi-pdf', ['items'=>$items]);
        $pdf->save(storage_path().'_transaction.pdf');
        return $pdf->stream();
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
