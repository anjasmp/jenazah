<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use App\UserFamilies;
use PDF;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Service::with([
            'transactions','user_families.user_detail.user'
        ])->orderBy('id', 'DESC')->get();

        // return $items;
        return view ('admin.pengaduan-musibah.index', compact('items'));
    }

    public function cetak_pdf()
    {
        $items = Service::with([
            'transactions','user_families.user_detail.user'
        ])->orderBy('id', 'DESC')->get();
       
         set_time_limit (300);
        
        $pdf = PDF::loadView('admin.pengaduan-musibah.service-list-pdf', ['items'=>$items]);
        $pdf->setPaper('A4', 'landscape');
        $pdf->save(storage_path().'_pengaduan-musibah.pdf');
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
        $item = Service::with([
            'transactions','user_families'
            ])->findOrFail($id);

            set_time_limit (300);
        
         $pdf = PDF::loadView('admin.pengaduan-musibah.service-pdf', ['item'=>$item]);
        $pdf->save(storage_path().'_pengaduan-musibah.pdf');
        return $pdf->stream();
        
        return view('admin.pengaduan-musibah.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Service::findOrFail($id);

        return view ('admin.pengaduan-musibah.edit', [
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
        

        $data = $request->all();

        $item = Service::findOrFail($id);


        $item->update($data);

        $UserFamilies = UserFamilies::where('id', $item->user_families_id);

        if ($item->service_status === 'ACCEPTED') {
            $UserFamilies->update(['userfamily_status' => 'NON ACTIVE']);
        } else {
           if ($item->service_status === 'PROCESS') {
            $UserFamilies->update(['userfamily_status' => 'PENDING']);
           } else {
               if ($item->service_status === 'CANCEL') {
                $UserFamilies->update(['userfamily_status' => 'ACTIVE']);
               }
           }
        }


        return redirect()->route('service.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Service::findOrFail($id);


        $item->delete();

        

        return redirect()->route('service.index')->with('success','Data berhasil dihapus (Cek Recyle Bin');
    }

    public function show_deletes(){
        $item = Service::onlyTrashed()->get();
        return view('admin.pengaduan-musibah.delete', compact('item'));
    }

    public function restore($id){
        $item = Service::withTrashed()->where('id', $id)->first();

        $item->restore();

        return redirect()->back()->with('success', 'Data berhasil diRestore (Cek List item)');
    }

    public function kill($id){
        $item = Service::withTrashed()->where('id', $id)->first();
        $item->forceDelete();

        return redirect()->back()->with('success', 'Data berhasil dihapus permanen');
    }


    
}
