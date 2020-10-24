<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados']=Empleados::paginate(5);



        return view('empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $empleado=Empleados::findOrFail($id);

        return view('empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEmpleado=request()->except(['_token','_method']);
       
        if ($request->hasFile('Foto')) {
         
            $empleado= Empleados::findOrFail($id);

            Storage::delete('public/'.$empleado->Foto);

            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');

        }

        Empleados::where('id','=',$id)->update($datosEmpleado);

        //$empleado= Empleados::findOrFail($id);
        //return view('empleados.edit',compact('empleado'));

        return redirect('empleados')->with('Mensaje','Empleado modificado con exito');
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