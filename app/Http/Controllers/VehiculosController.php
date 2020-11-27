<?php

namespace App\Http\Controllers;

use App\Models\Vehiculos;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['vehiculos']=Vehiculos::simplepaginate(10);
        return view('vehiculos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.create');
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
            'Patente'=>'required|string|max:6',
            'Anio'=>'required|string|max:4',
            'Marca'=>'required|string|max:100',
            'Modelo'=>'required|string|max:100',
            'Cilindrada'=>'required|string|max:4',
            'Color'=>'required|string|max:100'
        ];

        $Mensaje=["required"=>'El campo es requerido'];
        $this -> validate($request,$campos,$Mensaje);

        $datosVehiculo=request()->all();
        $datosVehiculo=request()->except('_token');

        Vehiculos::insert($datosVehiculo);
        return redirect('vehiculos')->with('Mensaje','Vehiculo agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $vehiculo=Vehiculos::findOrFail($id);
        return view('vehiculos.edit',compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $campos=[
            'Patente'=>'required|string|max:6',
            'Anio'=>'required|string|max:4',
            'Marca'=>'required|string|max:100',
            'Modelo'=>'required|string|max:100',
            'Cilindrada'=>'required|string|max:4',
            'Color'=>'required|string|max:100'
        ];

        $Mensaje=["required"=>'El campo es requerido'];
        $this -> validate($request,$campos,$Mensaje);
        $datosvehiculos=request()->except(['_token','_method']);

        Vehiculos::where('id','=',$id)->update($datosvehiculos);
        return redirect('vehiculos')->with('Mensaje','Vehiculo modificado con exito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehiculos::destroy($id);
        return redirect('vehiculos')->with('Mensaje','Vehiculo eliminado con exito');
    }
}
