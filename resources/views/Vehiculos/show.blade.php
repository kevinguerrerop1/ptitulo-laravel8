@extends('admin.layout.dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">

                <h3>Patente: {{$vehiculos->id}}</h3>
                <h3>Patente: {{$vehiculos->Patente}}</h3>
        </div>
        <div class="card-body">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Patente</th>
                        <th>Anio</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>{{$vehiculos->id}}</th>
                        <th>{{$vehiculos->Patente}}</th>
                        <th>{{$vehiculos->Anio}}</th>
                        <th>{{$vehiculos->Marca}}</th>
                        <th>{{$vehiculos->Modelo}}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
        </div>
    </div>
</div>
    
@endsection