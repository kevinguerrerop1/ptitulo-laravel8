@extends('admin.layout.dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Name: {{$user->name}}</h3>
            <h3>Email: {{$user->email}}</h3>
            <h3>Numero de post</h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">Role</h5>
            <p class="card-text">
               ..... 
            </p>
            <h5 class="card-title">Permisos</h5>
            <p class="card-text">
                .....
            </p>
        </div>
        <div class="card-footer">
            <a href="{{url()->previous()}}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
</div>
    
@endsection