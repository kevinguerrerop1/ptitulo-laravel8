<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use App\Models\Vehiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //dd(Auth::user()->id);

        if (\Auth::user()->hasRole('cliente')) {
            $datos['vehiculos']= DB::table('vehiculos_clientes')
            ->join('users','user_id','=','users.id')
            ->join('vehiculos','vehiculos_id','=','vehiculos.id')
            ->select('*')
            ->where('users.id','=',\Auth::user()->id)
            ->get();
        }else{
            $datos2['vehiculos']=Vehiculos::get();
            return view('vehiculos.index',$datos2);
        }
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
        $request->validate([
            'Patente'=>'required|string|max:6',
            'Anio'=>'required|string|max:4',
            'Marca'=>'required|string|max:100',
            'Modelo'=>'required|string|max:100',
            'Cilindrada'=>'required|string|max:4',
            'Color'=>'required|string|max:100'
        ]);

        $vehiculos = new Vehiculos();
        $vehiculos->Patente=$request->Patente;
        $vehiculos->Anio=$request->Anio;
        $vehiculos->Marca=$request->Marca;
        $vehiculos->Modelo=$request->Modelo;
        $vehiculos->Cilindrada=$request->Cilindrada;
        $vehiculos->Color=$request->Color;
        $vehiculos->save();
        return redirect('vehiculos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function show( Vehiculos $vehiculo)
    {
        return view('vehiculos.show',['vehiculo'=> $vehiculo]);
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
     **/

    public function destroy($id)
    {

    }
}
