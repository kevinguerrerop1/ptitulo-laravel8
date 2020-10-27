<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use Facade\FlareClient\View;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['articulos']=Articulos::paginate(5);

        return view('articulos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosArticulos=request()->all();
        $datosArticulos=request()->except('_token');

        if($request->hasFile('Foto')){

            $datosArticulos['Foto']=request()->file('Foto')->store('uploads','public');

        }

        Articulos::insert($datosArticulos);
        Return redirect('articulos')->with('Mensaje','Articulo agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function show(Articulos $articulos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $articulo=Articulos::findOrFail($id);

        return view('articulos.edit',compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $datosArticulo=request()->except(['_token','_method']);
       
        if ($request->hasFile('Foto')) {
         
            $articulo= Articulos::findOrFail($id);

            Storage::delete('public/'.$articulo->Foto);

            $datosArticulo['Foto']=$request->file('Foto')->store('uploads','public');

        }

        Articulos::where('id','=',$id)->update($datosArticulo);

        return redirect('articulos')->with('Mensaje','Empleado modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulos $articulos)
    {
        //
    }
}
