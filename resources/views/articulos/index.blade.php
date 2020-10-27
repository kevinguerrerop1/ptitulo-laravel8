@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<a href="{{url('articulos/create')}}" class="btn btn-success">Crear articulo nuevo</a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Valor</th>
            <th>Stock</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articulos as $articulo)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                <img src="{{ asset('storage').'/'. $articulo->Foto}}" alt="" class="img img-thumbnail img-fluid" width="100">    
            </td>
            <td>{{$articulo->Codigo}}</td>
            <td>{{$articulo->Nombre}}</td>
            <td>{{$articulo->Valor}}</td>
            <td>{{$articulo->Stock}}</td>
            <td>{{$articulo->Descripcion}}</td>
             <td><a class="btn btn-info" href="{{url('/articulos/'.$articulo->id.'/edit')}}">
                Editar
            </a>    
            /  
            <form method="post" action="{{url('/articulos/'.$articulo->id)}}" style="display:inline">
                
            {{csrf_field() }}
            {{ method_field('DELETE')}}
            <button type="submit" onclick="return confirm('Borrar?')" class="btn btn-danger">Borrar</button>
            /    
            <button type="submit" class="btn btn-warning" disabled>Ag.Stock</button>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
