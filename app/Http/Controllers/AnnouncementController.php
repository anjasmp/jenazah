<?php

namespace App\Http\Controllers;

use App\Announcements;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Announcements::orderBy('id', 'DESC')->get();

        return view ('admin.announcement.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.announcement.create');
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
            'content' => 'required'
        ]);

        Announcements::create([
            'content' => $request->content
        ]);

        return redirect()->route('announcement.index')->with('success','Data berhasil disimpan');
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
        $item = Announcements::findorfail($id);

        return view('admin.announcement.edit', compact('item'));
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
            'content' => 'required'
        ]);

        $announcement = [
            'content' => $request->content
        ];

        Announcements::whereId($id)->update($announcement);

        return redirect()->route('announcement.index')->with('success','Data berhasil diubah');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Announcements::findorfail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Postingan berhasil dihapus (Cek Recyle Bin)');
    }

    public function show_deletes()
    {
        $item = Announcements::onlyTrashed()->get();

        return view('admin.announcement.delete', compact('item'));
    }

    public function restore($id)
    {
        $item = Announcements::withTrashed()->where('id', $id)->first();

        $item->restore();

        return redirect()->back()->with('success', 'Postingan berhasil diRestore (Cek List Post)');
    }

    public function kill($id)
    {
        $item = Announcements::withTrashed()->where('id', $id)->first();
        $item->forceDelete();

        return redirect()->back()->with('success', 'Postingan berhasil dihapus permanen');
    }
}
