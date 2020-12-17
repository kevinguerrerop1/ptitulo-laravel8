@extends('admin.layout.dashboard')

@section('content')

<!-- Titulo + Boton create -->
  <div class="row py-lg-2">
    <div class="col-md-6">
      <h2>Listado de Vehiculos</h2>
    </div>
    <div class="col-md-6">
      <a href="{{url('vehiculos/create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Ingresar Nuevo Clientes</a>
    </div>
  </div>


  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
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
                <th>Acciones</th>
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
                <th>Acciones</th>
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
              <td><a href="{{url('/vehiculos/'.$vehiculo->id.'/edit')}}"><i class="fa fa-edit"></i>
              </a>     
              <form method="post" action="{{url('/vehiculos/'.$vehiculo->id)}}" style="display:inline">
                
              {{csrf_field() }}
              {{ method_field('DELETE')}}
              <a href="#"  data-toggle="modal" data-target="#deleteModal" data-postid="{{$vehiculo['id']}}" disabled><i class="fas fa-trash-alt"></i></a>
            </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
</div>
@endsection
</div>