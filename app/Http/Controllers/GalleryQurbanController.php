<?php

namespace App\Http\Controllers;

use App\GalleryQurban;
use App\Http\Requests\Admin\GalleryQurbanRequest;
use Illuminate\Http\Request;

class GalleryQurbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = GalleryQurban::orderBy('id', 'DESC')->get();

        return view('admin.laporan-qurban.gallery.index', [
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
        return view('admin.laporan-qurban.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryQurbanRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery-qurban', 'public'
        );

        GalleryQurban::create($data);

        return redirect()->route('gallery-qurban.index')->with('success','Data berhasil disimpan');
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
        $item = GalleryQurban::findOrFail($id);

        return view ('admin.laporan-qurban.gallery.edit', compact('item'));
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
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery-qurban', 'public'
        );

        $item =GalleryQurban::findOrFail($id);

        $item->update($data);
        return redirect()->route('gallery-qurban.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =GalleryQurban::findOrFail($id);

        $item->delete();
        return redirect()->route('gallery-qurban.index')->with('success','Data berhasil dihapus');
    }
}
