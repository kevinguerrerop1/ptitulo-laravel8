@extends('admin.layout.dashboard')

@section('content')

<h1>Update Role</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 

<form method="POST" action="{{url('/roles/'.$role->id)}}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf()
    
    <div class="form-group">
        <label for="role_name">Role name</label>
        <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Nombre del Rol" value="{{ $role->name }}" required>
    </div>
    <div class="form-group">
        <label for="role_slug">Role Slug</label>
        <input type="text" name="role_slug" class="form-control" id="role_slug" placeholder="Slug Rol" value="{{ $role->slug }}">
    </div>
    <div class="form-group" >
        <label for="roles_permissions">Add Permissions</label>
        <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control" id="roles_permissions" value="@foreach ($role->permissions as $permission)
            {{$permission->name. ","}}
        @endforeach">   
    </div> 

    <div class="form-group pt-2">
        <input type="submit" class="btn btn-primary" value="Submit">
    </div>

</form>

    @section('css_role_page')
        <link rel="stylesheet" href="{{'http://localhost:82/laravel/ptitulo/public/css/admin/bootstrap-tagsinput.css'}}" >
    @endsection

    @section('js_role_page')
        <script src="{{ asset('/js/admin/bootstrap-tagsinput.js')}}"> </script>
        <script>
            $(document).ready(function(){
                $('#role_name').keyup(function(e){
                    var str = $('#role_name').val();
                    str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//remplace stapces with dash
                    $('#role_slug').val(str);
                    $('#role_slug').attr('placeholder', str);
                });
            });
    </script>
    @endsection

@endsection