<?php

namespace App\Http\Controllers;

use App\PenyaluranQurban;
use Illuminate\Http\Request;

class PenyaluranQurbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = PenyaluranQurban::orderBy('id', 'DESC')->get();

        return view('admin.laporan-qurban.penyaluran.index', [
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
        return view('admin.laporan-qurban.penyaluran.create');
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
            'mukaddimah' => 'required',
            'total_sapi' => 'required',
            'total_kambing' => 'required',
            'paket_daging' => 'required',
            'penerima' => 'required'
        ]);

        PenyaluranQurban::create([
            'mukaddimah' => $request->mukaddimah,
            'total_sapi' => $request->total_sapi,
            'total_kambing' => $request->total_kambing,
            'paket_daging' => $request->paket_daging,
            'penerima' => $request->penerima

        ]);

        return redirect()->route('penyaluran-qurban.index')->with('success','Data berhasil disimpan');
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
        $item = PenyaluranQurban::findorfail($id);

        return view('admin.laporan-qurban.penyaluran.edit', compact('item'));
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
            'mukaddimah' => 'required',
            'total_sapi' => 'required',
            'total_kambing' => 'required',
            'paket_daging' => 'required',
            'penerima' => 'required'
        ]);

        $item = PenyaluranQurban::findorfail($id);

        $penyaluran_qurban = [
            'mukaddimah' => $request->mukaddimah,
            'total_sapi' => $request->total_sapi,
            'total_kambing' => $request->total_kambing,
            'paket_daging' => $request->paket_daging,
            'penerima' => $request->penerima
        ];

        $item->update($penyaluran_qurban);

        return redirect()->route('penyaluran-qurban.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PenyaluranQurban::findorfail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
