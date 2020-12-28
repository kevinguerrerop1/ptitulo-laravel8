<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['empleados']= DB::table('users_roles')
        ->join('users','users.id','=','users_roles.user_id')
        ->join('roles','roles.id','=','users_roles.role_id')
        ->select('users.id','users.name','ApellidoPaterno','ApellidoMaterno','rut','email')
        ->where('roles.name','=','Empleado')
        ->get();

        return view('Empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'Correo'=>'required|email',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosEmpleados=request()->all();
        $datosEmpleados=request()->except('_token');

        if($request->hasFile('Foto')){

           $datosEmpleados['Foto']=request()->file('Foto')->store('uploads','public'); 

        }

        Empleados::insert($datosEmpleados );
        return redirect('empleados')-> with('Mensaje','Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado=User::findOrFail($id);

        return view('empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $empleado)
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

        $empleado->name=$request->name;
        $empleado->ApellidoPaterno=$request->ApellidoPaterno;
        $empleado->ApellidoMaterno=$request->ApellidoMaterno;
        $empleado->Rut=$request->Rut;
        $empleado->email=$request->email;
        if ($request->password !=null) {
            $empleado->password =Hash::make($request->password);
        }

        $empleado->save();

        return redirect('/empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $empleado= Empleados::findOrFail($id);

        if (Storage::delete('public/'.$empleado->Foto)) {
          Empleados::destroy($id);
        } 
        return redirect('empleados')->with('Mensaje','Empleado eliminado con exito');
    }
}
