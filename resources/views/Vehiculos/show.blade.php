@extends('admin.layout.dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Patente: {{$vehiculo->Patente}}</h3>
        </div>
        <div class="card-body">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Patente</th>
                        <th>Anio</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                       @if ($vehiculo->servicios->isNotEmpty())
                                @foreach ($vehiculo->servicios as $servicio)
                                    <td>{{$servicio->Descripcion}}</td>

                                @endforeach
                            @endif
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
        </div>
    </div>
</div>
    
@endsection