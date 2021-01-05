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

<form method="POST" action="{{url('servicios/'.$servicio->id)}}" enctype="multipart/form-data">
@method('PATCH')
@csrf()



    <div class="form-group">
        <label for="id_vehiculo">Codigo Vehiculo</label>
        <input type="number" name="id_vehiculo" class="form-control" id="id_vehiculo" placeholder="Codigo Vehiculo" value="{{$servicio->vehiculo_id}}">
    </div>

    <div class="form-group">
        <label for="tiposervicios">Tipo Servicio</label>
        <select class="role form-control" name="tiposervicios" id="tiposervicios">
        <option value="Mantencion">Mantencion</option>
        <option value="Reparacion">Reparacion</option>
        </select>
    </div>

    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion" value="{{$servicio->descripcion}}">
    </div>

    <div class="form-group pt-2">
        <input type="submit" class="btn btn-primary" value="Submit">
        <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
    </div>


</form>

@endsection 