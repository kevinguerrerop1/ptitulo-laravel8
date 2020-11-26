@extends('layouts.app')

@section('content')

<div class="container">

<!--FORMATO ALETAR-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
   {{Session::get('Mensaje')}}
</div>
@endif

<a href="{{url('tiposervicios/create')}}" class="btn btn-success">Agregar Tipo de Servicio</a>
<br/>
<br/>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tiposervicios as $tiposervicio)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$tiposervicio->NombreTipoServicio}}</td>
            <td><a class="btn btn-info" href="{{url('/tiposervicios/'.$tiposervicio->id.'/edit')}}">
                Editar
            </a>    
            /  
            <form method="post" action="{{url('/tiposervicios/'.$tiposervicio->id)}}" style="display:inline">
                
            {{csrf_field() }}
            {{ method_field('DELETE')}}
            <button type="submit" onclick="return confirm('Borrar?')" class="btn btn-danger">Borrar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- INTRUCCION PARA PAGINAR-->
{{ $tiposervicios->links() }}

</div>

@endsection