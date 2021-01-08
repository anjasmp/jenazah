<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoPenagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = UserDetails::with([
            'user','transactions.product','user_families'
        ])->Where('users_id', Auth::user()->id)->orderBy('id', 'DESC')->get();

          
        return view ('member-area.pembayaran.informasi.index', compact('items'));
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
        $item = UserDetails::findOrFail($id);
        
        return view ('member-area.pembayaran.informasi.edit', [
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
        $this->validate($request, [
            'scan_kk' => 'image',
            'scan_ktp' => 'image'
        ]);

        $data = $request->all();
        
        if ($request->file('imgUpload1') == null) {
            $file = "";
        } else {
            $data['scan_kk'] = $request->file('scan_kk')->store(
                'assets/scan_kk', 'public'
            );
    
            $data['scan_ktp'] = $request->file('scan_ktp')->store(
                'assets/scan_ktp', 'public'
            ); 
        }
        

            

        $item = UserDetails::findOrFail($id);

        $item->update($data);

        return redirect()->route('info-tagihan.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
