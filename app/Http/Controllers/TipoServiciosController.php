<?php

namespace App\Http\Controllers;

use App\Models\TipoServicios;
use Illuminate\Http\Request;

class TipoServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['tiposervicios']=TipoServicios::paginate(5);
        return view('tiposervicios.index',$datos);
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
     * @param  \App\Models\TipoServicios  $tipoServicios
     * @return \Illuminate\Http\Response
     */
    public function show(TipoServicios $tipoServicios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoServicios  $tipoServicios
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoServicios $tipoServicios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoServicios  $tipoServicios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoServicios $tipoServicios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoServicios  $tipoServicios
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoServicios $tipoServicios)
    {
        //
    }
}
