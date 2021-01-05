<?php

namespace App\Http\Controllers;

use App\Models\Administradores;
use App\Models\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdministradoresController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.index'); 
        }elseif(Gate::allows('isCliente')){
            $datosCliente['vehiculos']=DB::table('vehiculos_clientes')
            ->join('users','user_id','=','users.id')
            ->join('vehiculos','vehiculos_id','=','vehiculos.id')
            ->select('*')
            ->where('users.id','=',\Auth::user()->id)
            ->get();
            return view('vehiculos.vehiculosrole.index',$datosCliente);
        }elseif(Gate::allows('isEmpleado')){
            $datosEmpleado['servicios']=Servicios::get();
            return view('servicios.index',$datosEmpleado);
        }
        
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
     * @param  \App\Models\Administradores  $administradores
     * @return \Illuminate\Http\Response
     */
    public function show(Administradores $administradores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administradores  $administradores
     * @return \Illuminate\Http\Response
     */
    public function edit(Administradores $administradores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administradores  $administradores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administradores $administradores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administradores  $administradores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administradores $administradores)
    {
        //
    }
}
