<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use App\Models\Vehiculos;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ServiciosController extends Controller
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
        $datos['servicios']=Servicios::get();
        return view('servicios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['vehiculos']=Vehiculos::get();
        return view('servicios.create',$datos);
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
            'id_vehiculo' => 'required',
            'tiposervicios' =>'required|max:191',
            'descripcion' =>'required|max:191'
        ]);

        $servicio= new Servicios();
        $servicio->tiposervicios=$request->tiposervicios;
        $servicio->descripcion=$request->descripcion;
        $servicio->save();

        if ($request->id_vehiculo !=null) {
            $servicio->vehiculos()->attach($request->id_vehiculo);
            $servicio->save();
        }

        return redirect('/servicios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function show(Servicios $servicio)
    {
        return view('servicios.show',['servicio'=>$servicio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $servicio=Servicios::findOrFail($id);
        return view('servicios.edit',['servicio'=>$servicio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicios $servicios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicios $servicios)
    {
        //
    }
}
