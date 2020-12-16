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
    <li class="breadcrumb-item active">Overview</li>
  </ol>
<!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
          Empleados
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($empleados as $empleado)
            <tr>
              <td>{{$loop->iteration}}</td>
                <td>
                    <img src="{{ asset('storage').'/'. $empleado->Foto}}" alt="" class="img img-thumbnail img-fluid" width="100">    
                </td>
               <td>{{$empleado->Nombre}} {{$empleado->ApellidoPaterno}} {{$empleado->ApellidoMaterno}}</td>
                 <td>{{$empleado->Correo}}</td>  
              <td><a href="{{url('/empleados/'.$empleado->id.'/edit')}}"><i class="fa fa-edit"></i>
              </a>     
              <form method="post" action="{{url('/post/'.$empleado->id)}}" style="display:inline">
                
              {{csrf_field() }}
              {{ method_field('DELETE')}}
              <a href="#"  data-toggle="modal" data-target="#deleteModal" data-postid="{{$empleado['id']}}"><i class="fas fa-trash-alt"></i></a>
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