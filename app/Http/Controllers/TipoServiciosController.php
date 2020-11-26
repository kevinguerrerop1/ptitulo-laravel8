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
         return view('tiposervicios.create');
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
            'NombreTipoServicio'=>'required|string|max:100'
        ];

        $Mensaje=["required"=>'El : campo es requerido'];
        $this -> validate($request,$campos,$Mensaje);

        $datosNts=request()->all();
        $datosNts=request()->except('_token');

        TipoServicios::insert($datosNts);
        return redirect('tiposervicios')->with('Mensaje','Tipo de servicio agregado con exito');

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
    public function edit($id)
    {
         $tiposervicio=TipoServicios::findOrFail($id);
        return view('tiposervicios.edit',compact('tiposervicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoServicios  $tipoServicios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'NombreTipoServicio'=>'required|string|max:100'
        ];

        $Mensaje=["required"=>'El : campo es requerido'];
        $this -> validate($request,$campos,$Mensaje);
        $datostservicios=request()->except(['_token','_method']);

        TipoServicios::where('id','=',$id)->update($datostservicios);
        return redirect('tiposervicios');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoServicios  $tipoServicios
     * @return \Illuminate\Http\Response
     */
    public function destroy($idtserv)
    {
        $datostservicios=TipoServicios::findOrFail($idtserv);
        TipoServicios::destroy($idtserv);
        return redirect('tiposervicios')->with('Mensaje','Tipo de servicios eliminado con exito');
    }
}
