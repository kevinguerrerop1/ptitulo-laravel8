@extends('admin.layout.dashboard')

@section('content')

<style>
  .multiselect {
      width: 200px;
      position:relative;
  }

  .selectBox {
      position: relative;
  }

  .selectBox select {
      width: 100%;
  }

  .overSelect {
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
  }

  #checkboxes {
      display: block;
      border: 1px #dadada solid;
      position:absolute;
      width:100%;
      background-color:white;
      box-sizing: border-box;
      overflow-y:auto;
      max-height:110px;
  }
  #checkboxes.hide {display:none;}

  #checkboxes label {
      display: block;
  }

  #checkboxes label:hover {
      background-color: #1e90ff;
  }
  </style>

<h1>Ingresar Servicio</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{url('/servicios')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
{{ csrf_field()}}

    <div class="form-group">
      <label for="id_vehiculo">Codigo Vehiculo</label>
      <input type="number" name="id_vehiculo" class="form-control" id="id_vehiculo" placeholder="Codigo Vehiculo" value="{{old('id_vehiculo')}}" required>
    </div>

    <div class="form-group">
      <label for="KMactual">Kilometraje Actual</label>
      <input type="number" name="KMactual" class="form-control" id="KMactual" placeholder="Kilometraje Actual" value="{{old('KMactual')}}" required>
    </div>

    <div class="form-group">
      <label for="KMproxima">Kilometraje Proxima Mantencion</label>
      <input type="number" name="KMproxima" class="form-control" id="KMproxima" placeholder="Recomendacion Cada 10.000 KM" value="{{old('KMproxima')}}" required>
    </div>

    <div class="form-group">
      <label for="tiposervicios">Tipo Servicio</label>
      <select class="role form-control" name="tiposervicios" id="tiposervicios">
        <option value="Mantencion">Mantencion</option>
        <option value="Reparacion">Reparacion</option>
      </select>
    </div>
     
    <div>
      <h6>Cada 10.000 Kilometros</h6>
      <div class="checkbox-inline">                    
        <label>
          <input type="checkbox" name="Caceite" id="Caceite" value="Realizado"> Cambio aceite motor + filtro
          &nbsp
        </label>
        <label>
          <input type="checkbox" name="Iniveles" id="Iniveles" value="Realizado"> Inspección de niveles
          &nbsp
        </label>
        <label>
          <input type="checkbox" name="Icorreas" id="Icorreas" value="Realizado"> Inspección de correas (alternador/ac/direccion)
          &nbsp
        </label>
        <label>
          <input type="checkbox" name="Iaire" id="Iaire" value="Realizado"> Inspección filtro de aire
          &nbsp
        </label>
        <label>
          <input type="checkbox" name="Ifrenos" id="Ifrenos" value="Realizado"> Inspección de frenos y suspensión
          &nbsp
        </label>
      </div>  
    </div>  

    <div>
      <h6>Cada 20.000 Kilometros</h6>
      <div class="checkbox-inline">                    
        <label>
          <input type="checkbox" name="Caire" id="Caire" value="Realizado"> Cambio filtro de aire
          &nbsp
        </label>
        <label>
          <input type="checkbox" name="Cpolen" id="Cpolen" value="Realizado"> Cambio filtro polen 
          &nbsp
        </label>
        <label>
          <input type="checkbox" name="Cbujias" id="Cbujias" value="Realizado"> Cambio bujias
          &nbsp
        </label>
      </div>  
    </div> 

    <div>
      <h6>Cada 50.000 Kilometros</h6>
      <div class="checkbox-inline">                    
        <label>
          <input type="checkbox" name="Cacc" id="Cacc" value="Realizado"> Cambio aceite caja de cambio
          &nbsp
        </label>
      </div>  
    </div> 

    <div>
      <h6>Cada 90.000 Kilometros</h6>
      <div class="checkbox-inline">                    
        <label>
          <input type="checkbox" name="Cad" id="Cad" value="Realizado"> Cambio de aceite diferencial
          &nbsp
        </label>
      </div>  
    </div> 

    <div class="form-group pt-2">
        <input type="submit" class="btn btn-primary" value="Ingresar">
        <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
    </div>

    <h3>Buscar Vehiculo</h3>
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
                <th>Codigo Vehiculo</th>
                <th>Patente</th>
                <th>Año</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Cilindrada</th>
                <th>Color</th>
                <th>Herramientas</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Codigo Vehiculo</th>
                <th>Patente</th>
                <th>Año</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Cilindrada</th>
                <th>Color</th>
                <th>Herramientas</th>
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
                <td>
                  <a href="{{url('/vehiculos/'.$vehiculo->id.'/')}}"><i class="fa fa-eye"></i></a>
                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</form>
@endsection