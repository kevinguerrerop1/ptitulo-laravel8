@extends('admin.layout.dashboard')

@section('content')

<!-- Titulo + Boton create -->
  <div class="row py-lg-2">
    <div class="col-md-6">
      <h2>Listado de Post</h2>
    </div>
    <div class="col-md-6">
      <a href="{{url('./users/create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear Nuevo Usuario</a>
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
          Post Publicados
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>Rol</th>
              <th>Permisos</th>
              <th>Herramientas</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>Rol</th>
              <th>Permisos</th>
              <th>Herramientas</th>
            </tr>
          </tfoot>
          <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>Roles</td>
              <td>Herramientas</td>
              <td>
                <a href="{{url('/users/'.$user->id.'/')}}"><i class="fa fa-eye"></i></a>
                <a href="{{url('/users/'.$user->id.'/edit')}}"><i class="fa fa-edit"></i></a>
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