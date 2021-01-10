@extends('admin.layout.dashboard')

@section('content')



<div class="container">
    <h1>Detalles</h1>
    <br>
    <div class="card">
        <div class="card-header">
            <h3>Patente: {{$vehiculo->Patente}}</h3>
            <h3>Marca: {{$vehiculo->Marca}}</h3>
            <h3>Modelo: {{$vehiculo->Modelo}}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Tipo de Servicio</th>
                            <th>Cambio Aceite</th>
                            <th>Inspección Niveles</th>
                            <th>Inspección Correas</th>
                            <th>Inspección Filtro Aire</th>
                            <th>Inspección Frenos</th>
                            <th>Cambio Filtro Aire</th>
                            <th>Cambio Filtro Polen</th>
                            <th>Cambio Bujias</th>
                            <th>Cambio Aceite Caja Cambio</th>
                            <th>Cambio Aceite Diferencial</th>
                            <th>KM Actual</th>
                            <th>KM Proxima Mantencion (Recomendado)</th>
                            <th>Fecha Mantencion</th>
                            <th>Herramientas</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Tipo de Servicio</th>
                            <th>Cambio Aceite</th>
                            <th>Inspección Niveles</th>
                            <th>Inspección Correas</th>
                            <th>Inspección Filtro Aire</th>
                            <th>Inspección Frenos</th>
                            <th>Cambio Filtro Aire</th>
                            <th>Cambio Filtro Polen</th>
                            <th>Cambio Bujias</th>
                            <th>Cambio Aceite Caja Cambio</th>
                            <th>Cambio Aceite Diferencial</th>
                            <th>KM Actual</th>
                            <th>KM Proxima Mantencion (Recomendado)</th>
                            <th>Fecha Mantencion</th>
                            <th>Herramientas</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if ($vehiculo->servicios->isNotEmpty())
                            @foreach ($vehiculo->servicios as $servicio)
                                <tr>
                                    <td>{{$servicio->id}}</td>
                                    <td>{{$servicio->tiposervicios}}</td>
                                    <td>{{$servicio->Caceite}}</td>
                                    <td>{{$servicio->Iniveles}}</td>
                                    <td>{{$servicio->Icorreas}}</td>
                                    <td>{{$servicio->Iaire}}</td>
                                    <td>{{$servicio->Ifrenos}}</td>
                                    <td>{{$servicio->Caire}}</td>
                                    <td>{{$servicio->Cpolen}}</td>
                                    <td>{{$servicio->Cbujias}}</td>
                                    <td>{{$servicio->Cacc}}</td>
                                    <td>{{$servicio->Cad}}</td>
                                    <td>{{$servicio->KMactual}}</td>
                                    <td>{{$servicio->KMproxima}}</td>
                                    <td>{{$servicio->created_at}}</td>
                                    <td>
                                        <a href="{{url('/servicios/'.$servicio->id.'/imprimiresp')}}"><i  class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
        </div>
    </div>
</div>
@endsection