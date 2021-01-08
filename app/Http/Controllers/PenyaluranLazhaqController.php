<?php

namespace App\Http\Controllers;

use App\PenerimaanLazhaq;
use App\PenyaluranLazhaq;
use Illuminate\Http\Request;

class PenyaluranLazhaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = PenyaluranLazhaq::orderBy('id', 'DESC')->get();

        // return $item;

        return view('admin.laporan-lazhaq.penyaluran.index', [
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
        $item = PenerimaanLazhaq::all();

        return view('admin.laporan-lazhaq.penyaluran.create', compact('item'));
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
            'penerimaan_lazhaqs_id' => 'required',
            'name' => 'required|min:3',
            'jumlah' => 'required|min:3'
        ]);

        PenyaluranLazhaq::create([
            'penerimaan_lazhaqs_id' => $request->penerimaan_lazhaqs_id,
            'name' => $request->name,
            'description' => $request->description,
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('penyaluran-lazhaq.index')->with('success','Data berhasil disimpan');
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
        $item = PenyaluranLazhaq::findorfail($id);
        $penerimaan = PenerimaanLazhaq::all();

        return view('admin.laporan-lazhaq.penyaluran.edit', compact('item','penerimaan'));
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
            'penerimaan_lazhaqs_id' => 'required',
            'name' => 'required|min:3',
            'jumlah' => 'required|min:3'
        ]);

        $item = PenyaluranLazhaq::findorfail($id);

        $penyaluran_lazhaq = [
            'penerimaan_lazhaqs_id' => $request->penerimaan_lazhaqs_id,
            'name' => $request->name,
            'description' => $request->description,
            'jumlah' => $request->jumlah
        ];

        $item->update($penyaluran_lazhaq);

        return redirect()->route('penyaluran-lazhaq.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PenyaluranLazhaq::findorfail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
