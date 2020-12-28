<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Role;
use App\Models\User;
use App\Models\Vehiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$datos['users']=User::get();
        

        $datos['clientes']= DB::table('users_roles')
        ->join('users','users.id','=','users_roles.user_id')
        ->join('roles','roles.id','=','users_roles.role_id')
        ->select('users.id','users.name','ApellidoPaterno','ApellidoMaterno','rut','email')
        ->where('roles.name','=','Cliente')
        ->get();

        return view('Clientes.index',$datos);

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
        return view('admin.users.create',['roles' => $roles]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Rut'=>'required|string|max:100',
            'Correo'=>'required|email'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosClientes=request()->all();
        $datosClientes=request()->except('_token');

        
        Clientes::insert($datosClientes );
        return redirect('clientes')-> with('Mensaje','Cliente agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $cliente=User::findOrFail($id);
        //dd($cliente);
        return view('clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $cliente)
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

        $cliente->name=$request->name;
        $cliente->ApellidoPaterno=$request->ApellidoPaterno;
        $cliente->ApellidoMaterno=$request->ApellidoMaterno;
        $cliente->Rut=$request->Rut;
        $cliente->email=$request->email;
        if ($request->password !=null) {
            $cliente->password =Hash::make($request->password);
        }

        $cliente->save();

        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $clientes)
    {
        //
    }

    public function asigacionvehiculo(Clientes $clientes, Vehiculos $vehiculos){

        

    }
}
