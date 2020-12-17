@extends('layouts.app')

@section('content')

<div class="container">

<!--FORMATO ALETAR-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
   {{Session::get('Mensaje')}}
</div>
@endif

<a href="{{url('vehiculos/create')}}" class="btn btn-success">Agregar Vehiculos</a>
<br/>
<br/>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Patente</th>
            <th>Año</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Cilindrada</th>
            <th>Color</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
       @foreach($vehiculos as $vehiculo)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$vehiculo->Patente}}</td>
            <td>{{$vehiculo->Anio}}</td>
            <td>{{$vehiculo->Marca}}</td>
            <td>{{$vehiculo->Modelo}}</td>
            <td>{{$vehiculo->Cilindrada}}</td>
            <td>{{$vehiculo->Color}}</td>
            <td><a class="btn btn-info" href="{{url('/vehiculos/'.$vehiculo->id.'/edit')}}">
                Editar
            </a>    
            /  
            <form method="post" action="{{url('/vehiculos/'.$vehiculo->id)}}" style="display:inline">
                
            {{csrf_field() }}
            {{ method_field('DELETE')}}
            <button type="submit" onclick="return confirm('Borrar?')" class="btn btn-danger" disabled>Borrar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- INTRUCCION PARA PAGINAR-->
{{ $vehiculos->links() }}

</div>

@endsection