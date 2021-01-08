<?php

namespace App\Http\Controllers;

use App\PenerimaanQurban;
use Illuminate\Http\Request;

class PenerimaanQurbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = PenerimaanQurban::orderBy('id', 'DESC')->get();

        return view('admin.laporan-qurban.penerimaan.index', [
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
        return view('admin.laporan-qurban.penerimaan.create');
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
            'nomor_hewan' => 'required',
            'tipe' => 'required',
            'nama' => 'required',
        ]);

        PenerimaanQurban::create([
            'nomor_hewan' => $request->nomor_hewan,
            'tipe' => $request->tipe,
            'nama' => $request->nama,
            'atas_nama' => $request->atas_nama,

        ]);

        return redirect()->route('penerimaan-qurban.index')->with('success','Data berhasil disimpan');
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
        $item = PenerimaanQurban::findorfail($id);

        return view('admin.laporan-qurban.penerimaan.edit', compact('item'));
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
            'nomor_hewan' => 'required',
            'tipe' => 'required',
            'nama' => 'required',
        ]);

        $penerimaan_qurban = [
            'nomor_hewan' => $request->nomor_hewan,
            'tipe' => $request->tipe,
            'nama' => $request->nama,
            'atas_nama' => $request->atas_nama,
        ];

        PenerimaanQurban::whereId($id)->update($penerimaan_qurban);

        return redirect()->route('penerimaan-qurban.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PenerimaanQurban::findorfail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
