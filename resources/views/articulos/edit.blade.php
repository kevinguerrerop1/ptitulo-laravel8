@extends('layouts.app')

@section('content')

<div class="container">


<form action="{{url('/articulos/'.$articulo->id)}}" method="post" enctype="multipart/form-data">

{{csrf_field()}}
{{method_field('PATCH')}}

@include('articulos.form',['Modo'=>'editar'])

</form>
</div>
@endsection