@extends('admin.layout.dashboard')

@section('content')

<div class="container">
    <h1>Detalles</h1>
    <br>
    <div class="card">
        <div class="card-header">
            <h3>Nombre: {{$cliente->name}} {{$cliente->ApellidoPaterno}} {{$cliente->ApellidoMaterno}}</h3>
            <h3>Rut:    {{$cliente->Rut}}</h3>
            <h3>Email:  {{$cliente->email}}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Patente</th>
                            <th>Año</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Cilindrada</th>
                            <th>Color</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Patente</th>
                            <th>Año</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Cilindrada</th>
                            <th>Color</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if ($cliente->vehiculos->isNotEmpty())
                            @foreach ($cliente->vehiculos as $vehiculo)
                                <tr>
                                    <td>{{$vehiculo->Patente}}</td>
                                    <td>{{$vehiculo->Anio}}</td>
                                    <td>{{$vehiculo->Marca}}</td>
                                    <td>{{$vehiculo->Modelo}}</td>
                                    <td>{{$vehiculo->Cilindrada}}</td>
                                    <td>{{$vehiculo->Color}}</td>
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