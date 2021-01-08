<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use DB;
use App\ModelHasRoles;
use App\Role as AppRole;
use App\Roles;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Permission as ContractsPermission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{

    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id')->get();
        // return $roles;
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = AppRole::orderBy('name', 'ASC')->get();
        return view('admin.user.create', compact('role'));
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
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'role' => 'required|string|exists:roles,name'
        ]);

        $user = User::firstOrCreate([
            'email' => $request->email
        ], [
            'name' => $request->name,
            'password' => bcrypt($request->password)
        ]);

        $user->assignRole($request->role);

        return redirect()->route('user.index')->with('success','Data berhasil disimpan');
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
        $item = User::findorfail($id);

        return view('admin.user.edit', compact('item'));
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
            'name' => 'required|string|max:100',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'nullable|min:6',
        ]);

        $register_admin = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password'])
        ];

        User::whereId($id)->update($register_admin);

        return redirect()->route('user.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findorfail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function roles(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name');
        return view('admin.user.role', compact('user', 'roles'));
    }

    public function setRole(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->syncRoles($request->role);
        return redirect()->route('user.index')->with('success','Data berhasil disimpan');
    }



    public function rolePermission(Request $request)
    {
    $role = $request->get('role');
    
    //Default, set dua buah variable dengan nilai null
    $permissions = null;
    $hasPermission = null;
    
    //Mengambil data role
    $roles = Role::all()->pluck('name');
    
    //apabila parameter role terpenuhi
    if (!empty($role)) {
        //select role berdasarkan namenya, ini sejenis dengan method find()
        $getRole = Role::findByName($role);
        
        //Query untuk mengambil permission yang telah dimiliki oleh role terkait
        $hasPermission = DB::table('role_has_permissions')
            ->select('permissions.name')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_id', $getRole->id)->get()->pluck('name')->all();
        
        //Mengambil data permission
        $permissions = Permission::all()->pluck('name');
    }
    return view('admin.permission.role_permission', compact('roles', 'permissions', 'hasPermission'));
    }
    

    public function addPermission(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:permissions'
        ]);

        $permission = Permission::firstOrCreate([
            'name' => $request->name
        ]);
        return redirect()->back();
    }

    public function setRolePermission(Request $request, $role)
    {
        $role = Role::findByName($role);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with(['success' => 'Permission to Role Saved!']);
    }
}
