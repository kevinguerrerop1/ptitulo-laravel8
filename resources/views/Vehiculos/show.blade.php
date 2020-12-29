@extends('admin.layout.dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Patente: {{$vehiculos->servicios}}</h3>
        </div>
        <div class="card-body">
            @foreach($vehiculos as $servicio)
        <tr>
            <td>{{$loop->iteration}}</td>

            <td>{{$servicio->vehiculos->Patente}}</td>
            <td>Edita][Borrar</td>
        </tr>
        @endforeach
            
           
        </div>
        <div class="card-footer">
            <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
        </div>
    </div>
</div>
    
@endsection