@extends('admin.layout.dashboard')

@section('content')

<div class="container">
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
                            <th>Descripcion</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Tipo de Servicio</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if ($vehiculo->servicios->isNotEmpty())
                            @foreach ($vehiculo->servicios as $servicio)
                                <tr>
                                    <td>{{$servicio->id}}</td>
                                    <td>{{$servicio->tiposervicios}}</td>
                                    <td>{{$servicio->descripcion}}</td>
                                    <td>{{$servicio->created_at}}</td>
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