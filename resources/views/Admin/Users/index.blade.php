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
              <th>Rut</th>
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
              <th>Rut</th>
              <th>Email</th>
              <th>Rol</th>
              <th>Permisos</th>
              <th>Herramientas</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($users as $user)
              <tr {{ Auth::user()->id == $user->id ? 'bgcolor=#ddd' : '' }}>
                <td>{{$user->id}}</td>
                <td>{{$user->name}} {{$user->ApellidoPaterno}}{{$user->ApellidoMaterno}}</td>
                <td>{{$user->Rut}}</td>
                <td>{{$user->email}}</td>
                <td>
                  @if ($user->roles->isNotEmpty())
                    @foreach ($user->roles as $role)
                        <span class="badge badge-primary">{{$role->name}}</span>
                    @endforeach
                  @endif
                </td>
                <td>
                  @if ($user->permissions->isNotEmpty())
                    @foreach ($user->permissions as $permission)
                        <span class="badge badge-primary">{{$permission->name}}</span>
                    @endforeach
                  @endif
                </td>
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

@section('js_user_page')
 <script src="{{ asset('vendor/chart.js/Chart.min.js')}}"> </script>
 <script src="{{ asset('js/admin/demo/chart-area-demo.js')}}"> </script>
@endsection

@endsection
