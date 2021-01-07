@extends('admin.layout.dashboard')

@section('content')

<!-- Titulo + Boton create -->
  <div class="row py-lg-2">
    <div class="col-md-6">
      <h2>Listado de Servicios</h2>
    </div>
    <div class="col-md-6">
      <a href="{{url('servicios/create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Agregar Nuevo Servicio</a>
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
         Lista de Servicios
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Patente</th>
              <th>Tipo de Servicio</th>
              <th>Cambio Aceite</th>
              <th>Inspección Niveles</th>
              <th>Inspección Correas</th>
              <th>Inspección Filtro Aire</th>
              <th>Inspección Frenos</th>
              <th>Cambio Filtro Aire</th>
              <th>Cambio Filtro Polen</th>
              <th>Cambio Bujias</th>
              <th>Cambio Aceite Caja Cambio</th>
              <th>Cambio Aceite Diferencial</th>
              <th>KM Actual</th>
              <th>KM Proxima Mantencion (Recomendado)</th>
              <th>Fecha Mantencion</th>
              <th>Herramientas</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Codigo</th>
              <th>Patente</th>
              <th>Tipo de Servicio</th>
              <th>Cambio Aceite</th>
              <th>Inspección Niveles</th>
              <th>Inspección Correas</th>
              <th>Inspección Filtro Aire</th>
              <th>Inspección Frenos</th>
              <th>Cambio Filtro Aire</th>
              <th>Cambio Filtro Polen</th>
              <th>Cambio Bujias</th>
              <th>Cambio Aceite Caja Cambio</th>
              <th>Cambio Aceite Diferencial</th>
              <th>KM Actual</th>
              <th>KM Proxima Mantencion (Recomendado)</th>
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
                <td>{{$servicio->Caceite}}</td>
                <td>{{$servicio->Iniveles}}</td>
                <td>{{$servicio->Icorreas}}</td>
                <td>{{$servicio->Iaire}}</td>
                <td>{{$servicio->Ifrenos}}</td>
                <td>{{$servicio->Caire}}</td>
                <td>{{$servicio->Cpolen}}</td>
                <td>{{$servicio->Cbujias}}</td>
                <td>{{$servicio->Cacc}}</td>
                <td>{{$servicio->Cad}}</td>
                <td>{{$servicio->KMactual}}</td>
                <td>{{$servicio->KMproxima}}</td>
                <td>{{$servicio->created_at}}</td>
                <td>
                  <a href="{{url('/servicios/'.$servicio->id.'/edit')}}"><i class="fa fa-edit" hidden></i></a>
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