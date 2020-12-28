@extends('admin.layout.dashboard')

@section('content')

<!-- Titulo + Boton create -->
  <div class="row py-lg-2">
    <div class="col-md-6">
      <h2>Listado de Post</h2>
    </div>
    <div class="col-md-6">
      <a href="{{url('./roles/create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear Nuevo Rol</a>
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
              <th>Role</th>
              <th>Slug</th>
              <th>Permisos</th>
              <th>Herramientas</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Role</th>
              <th>Slug</th>
              <th>Permisos</th>
              <th>Herramientas</th>
            </tr>
          </tfoot>
          <tbody>
          @foreach($roles as $role)
            <tr>
              <td>{{$role->id}}</td>
              <td>{{$role->name}}</td>
              <td>{{$role->slug}}</td>
              <td>
                @if ($role->permissions != null)
                    @foreach ($role->permissions as $permission)
                        <span class="badge badge-info">
                            {{$permission->name}}
                        </span>
                    @endforeach
                @endif
              </td>
              <td>
                <a href="{{url('/roles/'.$role->id.'/')}}"><i class="fa fa-eye"></i></a>
                <a href="{{url('/roles/'.$role->id.'/edit')}}"><i class="fa fa-edit"></i></a>
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
