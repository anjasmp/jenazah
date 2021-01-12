<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use App\Transaction;
use App\User;
use App\UserDetails;
use App\UserFamilies;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class TransactionController extends Controller
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
        ])->orderBy('id', 'DESC')->get();

        // return $items;
        return view ('admin.transaction.index', compact('items'));
    }


    public function cetak_pdf()
    {
        
        $items = Transaction::with([
            'user','product','user_detail','services'
        ])->orderBy('id', 'DESC')->get();
         set_time_limit (300);
        
        $pdf = PDF::loadView('admin.transaction.transaction-pdf', ['items'=>$items]);
        $pdf->setPaper('A4', 'landscape');
        $pdf->save(storage_path().'_transaction.pdf');
        return $pdf->stream();
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
    public function store(TransactionRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        Transaction::create($data);
        return redirect()->route('transaction.index')->with('success','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $item = Transaction::with([
        //     'user','product', 'user_detail.user_families', 'services'
        //     ])->findOrFail($id);


            $item = Transaction::with([
                'user','product', 'user_detail.user_families', 'services'
                ])->findOrFail($id);
    
            // if ($transaction == null) {
            //     $items = array();
            // } else {
            //     $items = UserFamilies::Where('user_details_id', Auth::user()->user_detail->id)->get();
    
            // }

        
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
        $item = Transaction::findOrFail($id);

        return view ('admin.transaction.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        $data = $request->all();

        $item = Transaction::with([
            'user','product', 'user_detail.user_families', 'services'
            ])->findOrFail($id);


        if ($data['transaction_status'] == 'SUCCESS') {
            $item->user->syncRoles('member');
            // $data['masa_aktif'] = [Carbon::parse()->addYear(1)];
        } else {
            $item->user->syncRoles('user');
        }




           if ($data['transaction_status'] == 'FINISHED' && $item->transaction_status == 'SUCCESS') {
            if ($item->transaction_total >= 265000 ) {
                $item->transaction_total = 250000;
            }

            $new_transaction = Transaction::create([
                'products_id' => $item->products_id,
                'users_id' => $item->users_id,
                'masa_aktif' => Carbon::parse($item->masa_aktif)->addYear(1),
                'register' => 1,
                'transaction_total' => $item->transaction_total,
                'transaction_status' => 'PENDING'
            ]);

            $item->user_detail()->update([
                'transactions_id' => $new_transaction->id,
            ]);
           }
    
            // echo $transaction->no_invoice;
   

        $item->update($data);
        
        return redirect()->route('transaction.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =Transaction::findOrFail($id);

        $item->delete();
        return redirect()->route('transaction.index')->with('success','Data berhasil dihapus (Cek Recyle Bin');
    }

    public function show_deletes(){
        $item = Transaction::onlyTrashed()->get();
        return view('admin.transaction.delete', compact('item'));
    }

    public function restore($id){
        $item = Transaction::withTrashed()->where('id', $id)->first();

        $item->restore();

        return redirect()->back()->with('success', 'Data berhasil diRestore (Cek List item)');
    }

    public function kill($id){
        $item = Transaction::withTrashed()->where('id', $id)->first();
        $item->forceDelete();

        return redirect()->back()->with('success', 'Data berhasil dihapus permanen');
    }
}