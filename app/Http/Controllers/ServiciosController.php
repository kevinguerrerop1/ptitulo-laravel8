<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Servicios;
use App\Models\Vehiculos;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
            'tiposervicios' =>'required|max:191'
        ]);

        $servicio= new Servicios();
        $servicio->tiposervicios=$request->tiposervicios;
        $servicio->Caceite=$request->Caceite;
        $servicio->Iniveles=$request->Iniveles ;
        $servicio->Icorreas=$request->Icorreas ;
        $servicio->Iaire=$request->Iaire ;
        $servicio->Ifrenos=$request->Ifrenos ;
        $servicio->Caire=$request->Caire;
        $servicio->Cpolen=$request->Cpolen;
        $servicio->Cbujias=$request->Cbujias;
        $servicio->Cacc=$request->Cacc;
        $servicio->Cad=$request->Cad;
        $servicio->KMactual=$request->KMactual;
        $servicio->KMproxima=$request->KMproxima;

        
        $servicio->save();

        if ($request->id_vehiculo !=null) {
            $servicio->vehiculos()->attach($request->id_vehiculo);
            $servicio->save();
        }

        $datos=DB::table('vehiculos_clientes')
        ->join('vehiculos','vehiculos_id','=','vehiculos.id')
        ->join('users','user_id','=','users.id')
        ->select('users.email')
        ->where('vehiculos.id','=',$request->id_vehiculo)
        ->get(); 

        $datos2=Vehiculos::select('*')
        ->where('id','=',$request->id_vehiculo)
        ->pluck('Patente')
        ->first();

        $detalles = [
            'title' =>  'Servicio ('.$request->tiposervicios.') Ingresado Correctamente a Vehiculo Patente '.$datos2,
            'body' =>   'Servicio '.$request->tiposervicios.' ingresado correctamente. Kilometraje de ingreso: '.$request->KMactual.' kilometros. Proxima visita
                        recomendada a los '.$request->KMproxima.' Kilometros. Para mas detalles
                        ingrese a nuestro sitio web www.Check-Ar.cl'
        ];

        Mail::to($datos)->send(new TestMail($detalles));

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
        
    }

    public function imprimir($id){
        $datos['servicios']=Servicios::findOrFail($id)->get();
        $pdf = PDF::loadView('Pdf.reporteservicio',$datos);
        return $pdf->setPaper('a4','landscape')->stream();
    }
    
    public function imprimiresp(Servicios $servicio){
        $pdf = PDF::loadView('Pdf.reporteservicioesp',['servicio'=>$servicio]);
        return $pdf->setPaper('a4','landscape')->stream();
    }
}
