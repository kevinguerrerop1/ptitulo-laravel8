@extends('admin.layout.dashboard')

@section('content')

<h1>Editar Usuario</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{url('empleados/'.$empleado->id)}}" enctype="multipart/form-data">
@method('PATCH')
@csrf()

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" value="{{ $empleado->name}}" required>
    </div>

    <div class="form-group">
        <label for="ApellidoPaterno">Apellido Paterno</label>
        <input type="text" name="ApellidoPaterno" class="form-control" id="ApellidoPaterno" placeholder="Apellido Paterno" value="{{$empleado->ApellidoPaterno}}" required>
    </div>

    <div class="form-group">
        <label for="ApellidoMaterno">Apellido Materno</label>
        <input type="text" name="ApellidoMaterno" class="form-control" id="ApellidoMaterno" placeholder="Apellido Materno" value="{{$empleado->ApellidoMaterno}}" required>
    </div>

    <div class="form-group">
        <label for="Rut">Rut</label>
        <input type="text" name="Rut" class="form-control" id="Rut" placeholder="Rut" value="{{$empleado->Rut}}" required maxlength="9" required>
    </div>

    <div class="form-group">
        <label for="email">Correo</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Correo" value="{{ $empleado->email }}">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password..." minlength="8">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Password Confirm</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Password..." id="password_confirmation">
    </div> 

    <div class="form-group pt-2">
        <input type="submit" class="btn btn-primary" value="Submit">
        <a href="{{url()->previous()}}" class="btn btn-primary">Atras</a>
    </div>


</form>

@endsection 
