@extends('layouts.app')

@section('content')

<div class="container">


<form action="{{url('/articulos')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}

@include('articulos.form',['Modo'=>'crear'])

</form>
</div>
@endsection