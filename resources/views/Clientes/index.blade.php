@extends('admin.layout.dashboard')

@section('content')

<!-- Titulo + Boton create -->
  <div class="row py-lg-2">
    <div class="col-md-6">
      <h2>Listado de Post</h2>
    </div>
    <div class="col-md-6">
      <a href="{{url('clientes/create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear Nuevo Usuario</a>
    </div>
  </div>

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Clientes</li>
  </ol>
<!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
          Listado de Clientes
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
              <th>Herramientas</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Rut</th>
              <th>Email</th>
              <th>Herramientas</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($clientes as $cliente)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$cliente->name}} {{$cliente->ApellidoPaterno}} {{$cliente->ApellidoMaterno}}</td>                
                <td>{{$cliente->rut}}</td>
                <td>{{$cliente->email}}</td>
                <td>
                  <a href="{{url('/clientes/'.$cliente->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                  <a href="{{url('/clientes/'.$cliente->id.'/')}}"><i class="fa fa-eye"></i></a>
                  <a href="{{url('/vehiculosclientes/create')}}"><i class="fa fa-plus-square"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@section('js_user_page')
 <script src="{{ asset('vendor/chart.js/Chart.min.js')}}"> </script>
 <script src="{{ asset('js/admin/demo/chart-area-demo.js')}}"> </script>
@endsection

@endsection