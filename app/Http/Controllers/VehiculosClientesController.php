<?php

namespace App\Http\Controllers;

use App\Models\VehiculosClientes;
use Illuminate\Http\Request;

class VehiculosClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehiculosclientes.index');;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculosclientes.create');
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
     * @param  \App\Models\VehiculosClientes  $vehiculosClientes
     * @return \Illuminate\Http\Response
     */
    public function show(VehiculosClientes $vehiculosClientes)
    {
        //
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
