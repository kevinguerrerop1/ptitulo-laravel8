@extends('admin.layout.dashboard')

@section('content')

<h1>Ingresar Vehiculo</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{url('/vehiculos')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
{{ csrf_field()}}

    <div class="form-group">
        <label for="Patente">Patente</label>
        <input type="text" name="Patente" class="form-control" id="Patente" placeholder="Patente" style="text-transform:uppercase;" value="{{old('Patente')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" required maxlength="6" minlength="6">
    </div>

    <div class="form-group">
        <label for="Anio">Año</label>
        <input type="text" name="Anio" class="form-control" id="Anio" placeholder="Año" value="{{old('Anio')}}" required>
    </div>

    <div class="form-group">
        <label for="Marca">Marca</label>
        <input type="text" name="Marca" class="form-control" id="Marca" placeholder="Marca" value="{{old('Marca')}}" required>
    </div>

    <div class="form-group">
        <label for="Modelo">Modelo</label>
        <input type="text" name="Modelo" class="form-control" id="Modelo" placeholder="Modelo" value="{{old('Modelo')}}" required>
    </div>

    <div class="form-group">
        <label for="Cilindrada">Cilindrada</label>
        <input type="number" name="Cilindrada" class="form-control" id="Cilindrada" placeholder="Cilindrada" value="{{old('Cilindrada')}}" maxlength="4">
    </div>

    <div class="form-group">
        <label for="Color">Color</label>
        <input type="text" name="Color" class="form-control" id="Color" placeholder="Color" value="{{old('Color')}}" required>
    </div>

    <div class="form-group pt-2">
        <input type="submit" class="btn btn-primary" value="Submit">
        <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
    </div>

</form>

@endsection