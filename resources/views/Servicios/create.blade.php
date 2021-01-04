@extends('admin.layout.dashboard')

@section('content')

<h1>Ingresar Servicio</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{url('/servicios')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
{{ csrf_field()}}

    <div class="form-group">
      <label for="id_vehiculo">Codigo Vehiculo</label>
      <input type="number" name="id_vehiculo" class="form-control" id="id_vehiculo" placeholder="Codigo Vehiculo" value="{{old('Patente')}}">
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
      <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion" value="{{old('descripcion')}}">
    </div>

    <div class="form-group pt-2">
        <input type="submit" class="btn btn-primary" value="Submit">
        <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
    </div>

    <h3>Buscar Vehiculo</h3>

     <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
          Vehiculos
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>Codigo Vehiculo</th>
                <th>Patente</th>
                <th>Año</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Cilindrada</th>
                <th>Color</th>
                <th>Herramientas</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Codigo Vehiculo</th>
                <th>Patente</th>
                <th>Año</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Cilindrada</th>
                <th>Color</th>
                <th>Herramientas</th>
            </tr>
          </tfoot>
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
            <td>
                <a href="{{url('/vehiculos/'.$vehiculo->id.'/')}}"><i class="fa fa-eye"></i></a>
            </td>
            </tr>
        @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</form>

@endsection