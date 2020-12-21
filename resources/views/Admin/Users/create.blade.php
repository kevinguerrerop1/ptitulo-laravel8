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
        <label for="ApellidoPaterno">Apellido Paterno</label>
        <input type="text" name="ApellidoPaterno" class="form-control" id="ApellidoPaterno" placeholder="Apellido Paterno" value="{{old('ApellidoPaterno')}}" required>
    </div>

    <div class="form-group">
        <label for="ApellidoMaterno">Apellido Materno</label>
        <input type="text" name="ApellidoMaterno" class="form-control" id="ApellidoMaterno" placeholder="Apellido Materno" value="{{old('ApellidoMaterno')}}" required>
    </div>

    <div class="form-group">
        <label for="Rut">Rut</label>
        <input type="text" name="Rut" class="form-control" id="Rut" placeholder="Rut" value="{{old('Rut')}}" required maxlength="9">
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
        <select class="role form-control" name="role" id="role">
                <option value="">Seleccione Rol</option>
            @foreach ($roles as $role)
                <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>

    <div id="permissions_box" >
        <label for="roles">Seleccione Permisos</label>
        <div id="permissions_ckeckbox_list">
        </div>
    </div>   

    <div class="form-group pt-2">
        <input type="submit" class="btn btn-primary" value="Submit">
    </div>

</form>

    @section('js_user_page')
        <script>
            $(document).ready(function(){
                var permissions_box = $('#permissions_box');
                var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');

                permissions_box.hide(); 

                $('#role').on('change', function(){
                    var role = $(this).find(':selected');
                    var role_id = role.data('role-id');
                    var role_slug = role.data('role-slug');

                    permissions_ckeckbox_list.empty();

                    $.ajax({
                        url: "http://localhost:82/laravel/ptitulo/public/users/create",
                        method: 'get',
                        dataType: 'json',
                        data: {
                            role_id: role_id,
                            role_slug: role_slug,
                        }
                    }).done(function(data) {
                        
                        console.log(data);
                        
                        permissions_box.show();                        
                        // permissions_ckeckbox_list.empty();

                        $.each(data, function(index, element){
                            $(permissions_ckeckbox_list).append(       
                                '<div class="custom-control custom-checkbox">'+                         
                                    '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.slug +'" value="'+ element.id +'">' +
                                    '<label class="custom-control-label" for="'+ element.slug +'">'+ element.name +'</label>'+
                                '</div>'
                            );
                        });
                    });
                });
            });
        </script>    
    @endsection

@endsection