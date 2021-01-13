<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::find(Auth::user()->id);

        return view('member-area.akun.edit-password',compact('users'));
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
 
            'oldpassword' => 'required',
            'newpassword' => 'required',
            ]);
     
     
     
           $hashedPassword = Auth::user()->password;
     
           if (\Hash::check($request->oldpassword , $hashedPassword )) {
     
             if (!\Hash::check($request->newpassword , $hashedPassword)) {
     
                  $users = User::find(Auth::user()->id);
                  $users->password = bcrypt($request->newpassword);
                  User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
     
                  session()->flash('success','password updated successfully');
                  return redirect()->back();
                }
     
                else{
                      session()->flash('success','new password can not be the old password!');
                      return redirect()->back();
                    }
     
               }
     
              else{
                   session()->flash('success','old password doesnt matched ');
                   return redirect()->back();
                 }
      
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
