<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Permission;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['users']=User::get();
        return view('admin.users.index',$datos);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $roles = Role::where('id',$request->role_id)->first();
            $permissions = $roles->permissions;
            return $permissions;
        }

        $roles = Role::all();
        return view('admin.users.create',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //Validacion de campos
        $request -> validate([
            'name' => 'required|max:191',
            'ApellidoPaterno' =>'required|max:191',
            'ApellidoMaterno'=>'required|max:191',
            'Rut'=>'required|max:191',
            'email' => 'required|unique:users|email|max:191',
            'password'=>'required|between:8,191|confirmed',
            'password_confirmation'=>'required'
        ]);

        $user = new User();
        $user->name=$request->name;
        $user->ApellidoPaterno=$request->ApellidoPaterno;
        $user->ApellidoMaterno=$request->ApellidoMaterno;
        $user->Rut=$request->Rut;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();

        //If para insertar roles en el usuario
        if ($request->role != null) {
            $user->roles()->attach($request->role);
            $user->save();
        }

        //If para insertar permisos en el usuario
        if ($request->permissions !=null) {
            foreach($request->permissions as $permission){
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    { 
        return view('admin.users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles=Role::get();
        $userRole=$user->roles->first();
        if ($userRole != null) {
            $rolePermissions = $userRole->allRolePermissions;
        }else{
            $rolePermissions=null;
        }
        $userPermissions = $user->permissions;


        return view('admin.users.edit',[
            'user'=>$user,
            'roles'=>$roles,
            'userRole'=>$userRole,
            'rolePermissions'=>$rolePermissions,
            'userPermissions'=>$userPermissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //Validacion de campos
        $request -> validate([
            'name' => 'required|max:191',
            'ApellidoPaterno' =>'required|max:191',
            'ApellidoMaterno'=>'required|max:191',
            'Rut'=>'required|max:191',
            'email' => 'required|email|max:191',
            'password'=>'required|between:8,191|confirmed',
            'password_confirmation'=>'required'
        ]);

        $user->name=$request->name;
        $user->ApellidoPaterno=$request->ApellidoPaterno;
        $user->ApellidoMaterno=$request->ApellidoMaterno;
        $user->Rut=$request->Rut;
        $user->email=$request->email;
        if ($request->password !=null) {
            $user->password =Hash::make($request->password);
        }

        $user->save();

        $user->roles()->detach();
        $user->permissions()->detach();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){            
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return redirect('/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->permissions()->detach();
        $user->delete();

        return redirect('/users'); 
    }
}
