@extends('admin.layout.dashboard')

@section('content')

<!-- Titulo + Boton create -->
  <div class="row py-lg-2">
    <div class="col-md-6">
      <h2>Listado de Servicios</h2>
    </div>
    <div class="col-md-6">
      <a href="{{url('servicios/create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Ingresar Nuevo Servicio</a>
    </div>
  </div>


  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Servicios</li>
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
                <th>Codigo</th>
                <th>Patente</th>
                <th>Tipo de Servicio</th>
                <th>Descripcion</th>
                <th>Fecha Mantencion</th>
                <th>Herramientas</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Codigo</th>
                <th>Patente</th>
                <th>Tipo se Servicio</th>
                <th>Descripcion</th>
                <th>Fecha Mantencion</th>
                <th>Herramientas</th>
          </tfoot>
          <tbody>
            @foreach($servicios as $servicio)
              <tr>
                <td>{{$servicio->id}}</td>
                <td>@if ($servicio->vehiculos->isNotEmpty())
                      @foreach ($servicio->vehiculos as $vehiculo)
                        <span class="badge badge-info">{{$vehiculo->Patente}}</span>
                      @endforeach
                    @endif</td>
                <td>{{$servicio->tiposervicios}}</td>
                <td>{{$servicio->descripcion}}</td>
                <td>{{$servicio->created_at}}</td>
                <td>
                  <a href="{{url('/servicios/'.$servicio->id.'/')}}"><i class="fa fa-eye"></i></a>
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