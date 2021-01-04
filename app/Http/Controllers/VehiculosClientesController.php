<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\User;
use App\Models\Vehiculos;
use App\Models\VehiculosClientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiculosClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehiculosclientes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['vehiculos']=Vehiculos::get();
        return view('vehiculosclientes.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'vehiculos_id' => 'required',
            'user_id' => 'required'
        ]);
        
        //dd($request);
        
        $vc = new VehiculosClientes();

        $vc->vehiculos_id=$request->vehiculos_id;
        $vc->user_id=$request->user_id;
        $vc->save();
        
        // if ($request->vehiculos_id !=null) {
        //     $vehiculosClientes->usuario()->attach($request->vehiculos_id);
        //     $vehiculosClientes->save();
        // }

        // if ($request->user_id !=null) {
        //     $vehiculosClientes->vehiculos()->attach($request->user_id);
        //     $vehiculosClientes->save();
        // }
        return redirect('/clientes');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehiculosClientes  $vehiculosClientes
     * @return \Illuminate\Http\Response
     */
    public function show($cliente)
    {
        dd($cliente);
        //return view('vehiculosclientes.create',['cliente'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehiculosClientes  $vehiculosClientes
     * @return \Illuminate\Http\Response
     */
    public function edit(VehiculosClientes $vehiculosClientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehiculosClientes  $vehiculosClientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehiculosClientes $vehiculosClientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehiculosClientes  $vehiculosClientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehiculosClientes $vehiculosClientes)
    {
        //
    }
}
