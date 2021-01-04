@extends('admin.layout.dashboard')

@section('content')

<h1>Ingresar Vehiculo</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{url('/vehiculosclientes')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
{{ csrf_field()}}
    <div class="form-group">
        <div class="form-group">
            <label for="vehiculos_id">Codigo Vehiculo</label>
            <input type="text" name="vehiculos_id" class="form-control" id="vehiculos_id" placeholder="Codigo Vehiculo" value="{{old('vehiculos_id')}}">
        </div>
        <div class="form-group">
            <label for="user_id">Codigo Cliente</label>
            <input type="text" name="user_id" class="form-control" id="user_id" placeholder="Codigo Cliente" value="{{old('user_id')}}">
        </div>
        <div class="form-group pt-2">
            <input type="submit" class="btn btn-primary" value="Submit">
            <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
        </div>

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
                                <th>Codigo</th>
                                <th>Patente</th>
                                <th>Año</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Codigo</th>
                                <th>Patente</th>
                                <th>Año</th>
                                <th>Marca</th>
                                <th>Modelo</th>
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
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
</form>
@endsection