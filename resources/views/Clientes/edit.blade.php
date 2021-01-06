@extends('admin.layout.dashboard')

@section('content')

<h1>Edit User</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{url('clientes/'.$cliente->id)}}" enctype="multipart/form-data">
@method('PATCH')
@csrf()

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" value="{{ $cliente->name}}" required>
    </div>

    <div class="form-group">
        <label for="ApellidoPaterno">Apellido Paterno</label>
        <input type="text" name="ApellidoPaterno" class="form-control" id="ApellidoPaterno" placeholder="Apellido Paterno" value="{{$cliente->ApellidoPaterno}}" required>
    </div>

    <div class="form-group">
        <label for="ApellidoMaterno">Apellido Materno</label>
        <input type="text" name="ApellidoMaterno" class="form-control" id="ApellidoMaterno" placeholder="Apellido Materno" value="{{$cliente->ApellidoMaterno}}" required>
    </div>

    <div class="form-group">
        <label for="Rut">Rut</label>
        <input type="text" name="Rut" class="form-control" id="Rut" placeholder="Rut" value="{{$cliente->Rut}}" required maxlength="9" required>
    </div>

    <div class="form-group">
        <label for="email">Correo</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Correo" value="{{ $cliente->email }}">
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" minlength="8">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Contraseña" id="password_confirmation">
    </div> 

    <div class="form-group pt-2">
        <input type="submit" class="btn btn-primary" value="Submit">
        <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
    </div>


</form>

@endsection 
