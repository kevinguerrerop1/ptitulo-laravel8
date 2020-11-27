@extends('layouts.app')

@section('content')

<div class="container">

<!--FORMATO ALETAR-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
   {{Session::get('Mensaje')}}
</div>
@endif

<a href="{{url('clientes/create')}}" class="btn btn-success">Agregar Cliente</a>
<br/>
<br/>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Rut</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
       @foreach($clientes as $cliente)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$cliente->Nombre}}</td>
            <td>{{$cliente->ApellidoPaterno}}</td>
            <td>{{$cliente->ApellidoMaterno}}</td>
            <td>{{$cliente->Rut}}</td>
            <td>{{$cliente->Correo}}</td>
           <td><a class="btn btn-info" href="{{url('/clientes/'.$cliente->id.'/edit')}}">
                Editar
            </a>    
            /  
            <form method="post" action="{{url('/clientes/'.$cliente->id)}}" style="display:inline">
                
            {{csrf_field() }}
            {{ method_field('DELETE')}}
            <button type="submit" onclick="return confirm('Borrar?')" class="btn btn-danger">Borrar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- INTRUCCION PARA PAGINAR-->
{{ $clientes->links() }}

</div>

@endsection