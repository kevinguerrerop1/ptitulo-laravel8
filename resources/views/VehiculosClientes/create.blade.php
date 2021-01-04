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
            <label for="name">Codigo Cliente</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Codigo Cliente" value="{{old('name')}}" required>
        </div>

        <div class="form-group">
            <label for="name">Codigo Vehiculo</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Codigo Vehiculo" value="{{old('name')}}" required>
        </div>

    </div>    
</form>

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
                    <th>Patente</th>
                    <th>Año</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
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
@endsection