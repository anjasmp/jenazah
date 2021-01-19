<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use App\UserFamilies;
use App\Transaction;
use Illuminate\Foundation\Auth\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = UserFamilies::with([
            'user_detail.user','user_detail.transactions','services'
        ])->orderBy('id', 'DESC')->get();

        // return $items;

        return view ('admin.members.index', compact('items'));
    }

    public function cetak_pdf()
    {
        
        $items = UserFamilies::with([
            'user_detail.user','user_detail.transactions','services'
        ])->orderBy('id', 'DESC')->get();

        // return $items;
         set_time_limit (300);
        
        $pdf = PDF::loadView('admin.members.members-pdf', ['items'=>$items]);
        $pdf->setPaper('A4', 'landscape');
        $pdf->save(storage_path().'_daftaranggota.pdf');
        return $pdf->stream();
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = UserFamilies::findOrFail($id);

        return view ('admin.members.edit', [
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
    public function update(Request $request, $id)
    {
        

        $item = UserFamilies::findOrFail($id);


        $data = $request->all();

        $item->update($data);

        return redirect()->route('daftar-anggota.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = UserFamilies::findOrFail($id);

        $item->delete();
        return redirect()->route('daftar-anggota.index')->with('success','Data berhasil dihapus (Cek Recyle Bin');
    }

    public function show_deletes(){

        $item = UserFamilies::with([
            'user_detail.user','services'
        ])->onlyTrashed()->get();

        

        return view('admin.members.delete', compact('item'));
    }

    public function restore($id){
        $item = UserFamilies::with([
            'user_detail.user','services'
        ])->withTrashed()->where('id', $id)->first();

        $item->restore();

        return redirect()->back()->with('success', 'Data berhasil diRestore (Cek List item)');
    }

    public function kill($id){
        $item = UserFamilies::with([
            'user_detail.user','services'
        ])->withTrashed()->where('id', $id)->first();
        $item->forceDelete();

        return redirect()->back()->with('success', 'Data berhasil dihapus permanen');
    }

    public function create_kematian($id)
    {

        $item = UserFamilies::findOrFail($id);

        return view('admin.members.create', compact('item'));
    }

    public function store_kematian(Request $request, $id)
    {
        $this->validate($request, [
            'nama_ayah' => 'required|string',
            'tanggal_wafat' => 'required|date|nullable|date_format:Y-m-d|before:tomorrow',
            'waktu_wafat' => 'date_format:H:i',
            'tempat_wafat' => 'required|string',
            'tempat_pemakaman' => 'required|string',
            'kk_atau_ktp'  => 'required|image|mimes:jpeg,png,jpg|max:1000',
            'userfamily_status' => 'string'

        ]);


        $data = $request->all();
        

        $data['kk_atau_ktp'] = $request->file('kk_atau_ktp')->store(
            'assets/kk_atau_ktp', 'public'
        );        

        $user_families = UserFamilies::with(['user_detail.transactions'])->findOrFail($id);

        // return $user_families;

        UserFamilies::findOrFail($id)
        ->update(['userfamily_status' => 'PENDING']);

        Service::create([
            'transactions_id' => $user_families->user_detail->transactions->id,
            'user_families_id' => $user_families->id,
            'nama_ayah' => $data['nama_ayah'],
            'tanggal_wafat' => $data['tanggal_wafat'],
            'waktu_wafat' => $data['waktu_wafat'],
            'tempat_wafat' => $data['tempat_wafat'],
            'tempat_pemakaman' => $data['tempat_pemakaman'],
            'kk_atau_ktp' => $data['kk_atau_ktp'],
            'service_status' => 'PROCESS'
        ]);


        return redirect()->route('daftar-anggota.index')->with('success','Data berhasil diinput');
    }
}
