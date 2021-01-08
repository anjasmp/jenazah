<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\UserDetails;
use App\UserFamilies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = UserFamilies::Where('user_details_id', Auth::user()->id)->orderBy('id', 'DESC')->get();


        return view ('member-area.daftar_anggota.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        $items = UserFamilies::Where('user_details_id',Auth::user()->id)->get();
        
        return view('member-area.daftar_anggota.create',[
            'items' => $items
        ]);
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
            'name' => 'max:100',
            'tempat_lahir' => 'string|max:255',
            'tanggal_lahir' => 'date',
            'nik' => 'string|max:255|unique:user_families,nik'
        ]);


        $data = $request->all();


        $details = UserDetails::where([
            'users_id' => Auth::user()->id
        ])->first();

        UserFamilies::create([
            'user_details_id' => $details->id,
            'name' => $data['name'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'nik' => $data['nik'],
            'userfamily_status' => 'PENDING'

        ]);


        return redirect()->route('anggota.index');
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
        $items = UserFamilies::Where('user_details_id', Auth::user()->id)->findorfail($id);

        return view('member-area.daftar_anggota.edit',[
            'items' => $items
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
            'name' => 'max:100',
            'tempat_lahir' => 'string|max:255',
            'tanggal_lahir' => 'date',
            'nik' => 'string|max:255|unique:user_families,nik, '.$id
        ]);


        $data = [
            'name' => $request->name,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nik' => $request->nik
        ];

        UserFamilies::whereId($id)->update($data);

        return redirect()->route('anggota.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = UserFamilies::findorfail($id);


        $item->delete();


        return redirect()->route('anggota.index', $item->transactions_id);
    }
}
