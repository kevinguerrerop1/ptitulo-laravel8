@extends('admin.layout.dashboard')

@section('content')

<h1>Create New User</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{url('/users')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
{{ csrf_field()}}

    <div class="form-group">
        <label for="name">Nombre de Usuario</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" value="{{old('name')}}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{old('password')}}" required minlength="8">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password" value="{{old('password_confirmation')}}" required>
    </div>

    <div class="form-group">
        <label for="role">Seleccione Rol</label>
        ...............................
    </div>

    <div id="permissions_box">
        ...............................
    </div>

    <div class="form-group pt-2">
        <input type="submit" class="btn btn-primary" value="Submit">
    </div>

</form>
@endsection