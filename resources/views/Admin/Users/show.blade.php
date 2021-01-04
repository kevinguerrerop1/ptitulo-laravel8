@extends('admin.layout.dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Name: {{$user->name}}</h3>
            <h3>Email: {{$user->email}}</h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">Role</h5>
            <p class="card-text">
                @if ($user->roles->isNotEmpty())
                    @foreach ($user->roles as $role)
                        <span class="badge badge-primary">{{$role->name}}</span>
                    @endforeach
                @endif
            </p>
            <h5 class="card-title">Permisos</h5>
            <p class="card-text">
               @if ($user->permissions->isNotEmpty())
                    @foreach ($user->permissions as $permission)
                        <span class="badge badge-primary">{{$permission->name}}</span>
                    @endforeach
                @endif
            </p>
        </div>
        <div class="card-footer">
            <a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
        </div>
    </div>
</div>
    
@endsection