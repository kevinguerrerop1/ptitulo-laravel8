@extends('layouts.app')

@section('content')

<div class="container">

<!--FORMATO ALETAR-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
   {{Session::get('Mensaje')}}
</div>
@endif

<a href="{{url('servicios/create')}}" class="btn btn-success">Agregar Servicio</a>
<br/>
<br/>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Tipo de Servicio</th>
            <th>Empleado</th>
            <th>Patente Vehiculo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
       @foreach($servicios as $servicio)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$servicio->tiposervicios->NombreTipoServicio}}</td>
            <td>{{$servicio->empleados->Nombre}}</td>
            <td>{{$servicio->vehiculos->Patente}}</td>
            <td>Edita][Borrar</td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- INTRUCCION PARA PAGINAR-->
{{ $servicios->links() }}

</div>

@endsection