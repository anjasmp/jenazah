<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionProductRequest;
use App\TransactionProduct;
use App\User;
use App\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TransactionProduct::with([
            'details', 'product', 'user'
        ])->orderBy('id', 'DESC')->get();


        return view ('admin.transaction-product.index', compact('items'));
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
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        TransactionProduct::create($data);
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
        $item = TransactionProduct::with([
            'details', 'product', 'user'
            ])->findOrFail($id);

        
        
        $userdetail = UserDetails::with([
            'user'
        ])->findOrFail($id);
        

        return $userdetail;

        return view('admin.transaction-product.detail', compact('item', 'userdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TransactionProduct::findOrFail($id);

        return view ('admin.transaction-product.edit', [
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
    public function update(TransactionProductRequest $request, $id)
    {
        $data = $request->all();
        // $data['slug'] = Str::slug($request->title);

        $item = TransactionProduct::findOrFail($id);

        $item->update($data);
        // $data = $request->all();
        // $transaction_products->transaction_status = $data['transaction_status'];
        // $transaction_products->save();

        // $transaction->update($data);
        return redirect()->route('transaction-product.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =TransactionProduct::findOrFail($id);

        $item->delete();
        return redirect()->route('transaction-product.index')->with('success','Data berhasil dihapus (Cek Recyle Bin');
    }

    public function show_deletes(){
        $item = TransactionProduct::onlyTrashed()->get();
        return view('admin.transaction-product.delete', compact('item'));
    }

    public function restore($id){
        $item = TransactionProduct::withTrashed()->where('id', $id)->first();

        $item->restore();

        return redirect()->back()->with('success', 'Data berhasil diRestore (Cek List item)');
    }

    public function kill($id){
        $item = TransactionProduct::withTrashed()->where('id', $id)->first();
        $item->forceDelete();

        return redirect()->back()->with('success', 'Data berhasil dihapus permanen');
    }
}
