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

<form action="{{url('/roles')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
{{ csrf_field()}}

    <div class="form-group">
        <label for="role_name">Nombre del Rol</label>
        <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Nombre" value="{{old('role_name')}}" required>
    </div>

    <div class="form-group">
        <label for="role_slug">Slug</label>
        <input type="text" name="role_slug" class="form-control" id="role_slug" placeholder="Slug" value="{{old('role_slug')}}" required>
    </div>

    <div class="form-group">
        <label for="roles_permissions">Permisos</label>
        <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control" id="roles_permissions" value="{{ old('roles_permissions') }}">   
    </div>

    <div class="form-group pt-2">
        <input type="submit" class="btn btn-primary" value="Submit">
    </div>

</form>

    @section('css_role_page')
        <link rel="stylesheet" href="{{'css/admin/bootstrap-tagsinput.css'}}" >
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