<?php

namespace App\Http\Controllers;

use App\Models\Administradores;
use App\Models\Servicios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdministradoresController extends Controller
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
        //Conteo de Servicios
        $caceites=Servicios::select(DB::raw("COUNT(*) as count"))->where('Caceite','=','Realizado')->get();

        $resultados=[];
        array_push($resultados,[0,$caceites[0]['count']]);

        $iniveles=Servicios::select(DB::raw("COUNT(*) as count"))->where('Iniveles','=','Realizado')->get();
        array_push($resultados,[1,$iniveles[0]['count']]);

        $icorreas=Servicios::select(DB::raw("COUNT(*) as count"))->where('Icorreas','=','Realizado')->get();
        array_push($resultados,[2,$icorreas[0]['count']]);

        $iaire=Servicios::select(DB::raw("COUNT(*) as count"))->where('Iaire','=','Realizado')->get();
        array_push($resultados,[3,$iaire[0]['count']]);

        $ifrenos=Servicios::select(DB::raw("COUNT(*) as count"))->where('Ifrenos','=','Realizado')->get();
        array_push($resultados,[4,$ifrenos[0]['count']]);

        $caire=Servicios::select(DB::raw("COUNT(*) as count"))->where('Caire','=','Realizado')->get();
        array_push($resultados,[5,$caire[0]['count']]);

        $cpolen=Servicios::select(DB::raw("COUNT(*) as count"))->where('Cpolen','=','Realizado')->get();
        array_push($resultados,[6,$cpolen[0]['count']]);

        $cbujias=Servicios::select(DB::raw("COUNT(*) as count"))->where('Cbujias','=','Realizado')->get();
        array_push($resultados,[7,$cbujias[0]['count']]);

        $cacc=Servicios::select(DB::raw("COUNT(*) as count"))->where('Cacc','=','Realizado')->get();
        array_push($resultados,[8,$cacc[0]['count']]);

        $cad=Servicios::select(DB::raw("COUNT(*) as count"))->where('Cad','=','Realizado')->get();
        array_push($resultados,[9,$cad[0]['count']]);
       
        //Conteo de Usuario
        $users = User::select(DB::raw("MONTH(created_at) as mes"),DB::raw("COUNT(*) as count"))
                ->whereYear('created_at','2021')
                ->groupBy(DB::raw("Month(created_at)"))
                ->get();

        $datas=[];
                
        foreach($users as $index => $user){
            array_push($datas, [$user['mes'] -1, $user['count']]);
        }

        if (Gate::allows('isAdmin')) {
            $datos['users']=User::get();
            return view('admin.index',$datos,compact('datas','resultados'));

        }elseif(Gate::allows('isCliente')){
            $datosCliente['vehiculos']=DB::table('vehiculos_clientes')
            ->join('users','user_id','=','users.id')
            ->join('vehiculos','vehiculos_id','=','vehiculos.id')
            ->select('*')
            ->where('users.id','=',\Auth::user()->id)
            ->get();
            return view('vehiculos.vehiculosrole.index',$datosCliente);
            
        }elseif(Gate::allows('isEmpleado')){
            $datosEmpleado['servicios']=Servicios::get();
            return view('servicios.index',$datosEmpleado);
        }

        
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
     * @param  \App\Models\Administradores  $administradores
     * @return \Illuminate\Http\Response
     */
    public function show(Administradores $administradores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administradores  $administradores
     * @return \Illuminate\Http\Response
     */
    public function edit(Administradores $administradores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administradores  $administradores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administradores $administradores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administradores  $administradores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administradores $administradores)
    {
        //
    }
}
