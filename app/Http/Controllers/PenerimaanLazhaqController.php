<?php

namespace App\Http\Controllers;

use App\PenerimaanLazhaq;
use Illuminate\Http\Request;

class PenerimaanLazhaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = PenerimaanLazhaq::orderBy('id', 'DESC')->get();

        return view('admin.laporan-lazhaq.penerimaan.index', [
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
        return view('admin.laporan-lazhaq.penerimaan.create');
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
            'name' => 'required|min:3',
            'jumlah' => 'required|min:3'
        ]);

        PenerimaanLazhaq::create([
            'name' => $request->name,
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('penerimaan-lazhaq.index')->with('success','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = PenerimaanLazhaq::findorfail($id);

        return view('admin.laporan-lazhaq.penerimaan.edit', compact('item'));
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
        $this->validate($request, [
            'name' => 'required|min:3',
            'jumlah' => 'required|min:3'
        ]);

        $penerimaan_lazhaq = [
            'name' => $request->name,
            'jumlah' => $request->jumlah
        ];

        PenerimaanLazhaq::whereId($id)->update($penerimaan_lazhaq);

        return redirect()->route('penerimaan-lazhaq.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PenerimaanLazhaq::findorfail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
