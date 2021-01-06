@extends('admin.layout.dashboard')

@section('content')

<div class="container">
    <h1>Detalles</h1>
    <br>
    <div class="card">
        <div class="card-header">
            <h3>Nombre del Rol: {{$role->name}}</h3>
            <h3>Nombre de Pila: {{$role->slug}}</h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">Role</h5>
            <p class="card-text">
                <td>
                    @if ($role->permissions != null)
                        @foreach ($role->permissions as $permission)
                            <span class="badge badge-info">
                                {{$permission->name}}
                            </span>
                        @endforeach
                    @endif
              </td>
            </p>
        </div>
        <div class="card-footer">
            <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
        </div>
    </div>
</div>
@endsection