@extends('admin.layout.dashboard')

@section('content')

<!-- Titulo + Boton create -->
  <div class="row py-lg-2">
    <div class="col-md-6">
      <h2>Listado de Post</h2>
    </div>
    <div class="col-md-6">
      <a href="{{url('clientes/create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Ingresar Nuevo Clientes</a>
    </div>
  </div>
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Usuarios</li>
  </ol>
<!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
          Post Publicados
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Rut</th>
            <th>Correo</th>
            <th>Acciones</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Rut</th>
            <th>Correo</th>
            <th>Acciones</th>
            </tr>
          </tfoot>
          <tbody>
        @foreach($clientes as $cliente)
            <tr>
              <td>{{$loop->iteration}}</td>
            <td>{{$cliente->Nombre}}</td>
            <td>{{$cliente->ApellidoPaterno}}</td>
            <td>{{$cliente->ApellidoMaterno}}</td>
            <td>{{$cliente->Rut}}</td>
            <td>{{$cliente->Correo}}</td>
              <td><a href="{{url('/clientes/'.$cliente->id.'/edit')}}"><i class="fa fa-edit"></i>
              </a>     
              <form method="post" action="{{url('/clientes/'.$cliente->id)}}" style="display:inline">
                
              {{csrf_field() }}
              {{ method_field('DELETE')}}
              <a href="#"  data-toggle="modal" data-target="#deleteModal" data-postid="{{$cliente['id']}}"><i class="fas fa-trash-alt"></i></a>
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