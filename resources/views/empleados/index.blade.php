@extends('admin.layout.dashboard')

@section('content')

<!-- Titulo + Boton create -->
  <div class="row py-lg-2">
    <div class="col-md-6">
      <h2>Listado de Empleados</h2>
    </div>
    <div class="col-md-6">
      <a href="{{url('empleados/create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Ingresar Nuevo Empleado</a>
    </div>
  </div>


  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Empleados</li>
  </ol>
<!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
          Listado de Empleados
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($empleados as $empleado)
            <tr>
              <td>{{$loop->iteration}}</td>
               
               <td>{{$empleado->name}} {{$empleado->ApellidoPaterno}} {{$empleado->ApellidoMaterno}}</td>
                 <td>{{$empleado->email}}</td>  
              <td><a href="{{url('/empleados/'.$empleado->id.'/edit')}}"><i class="fa fa-edit"></i>
              </a>     
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