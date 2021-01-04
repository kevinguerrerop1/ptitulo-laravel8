@extends('admin.layout.dashboard')

@section('content')

<!-- Titulo + Boton create -->
  <div class="row py-lg-2">
    <div class="col-md-6">
      <h2>Listado de Vehiculos</h2>
    </div>
  </div>


  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Vehiculos</li>
  </ol>
<!-- DataTables Example -->
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
                <th>#</th>
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
                <th>#</th>
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
</div>
@endsection
</div>