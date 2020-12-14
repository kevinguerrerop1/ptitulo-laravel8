@extends('admin.layout.dashboard')

@section('content')

<!--FORMATO ALETAR-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
   {{Session::get('Mensaje')}}
</div>
@endif
<form action="{{url('/post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf()

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Title..." value="{{$post->titulo}}">
    </div>
    <div class="form-group">
        <label for="imagen">Seleccione Imagen</label>
        <input type="file" name="imagen" class="form-control-file" id="profile-img" value="{{$post->imagen}}">
        <div class="row">
            <img src="{{ asset('storage').'/'. $post->imagen}}" alt="" class="img img-thumbnail img-fluid" width="200">       
        </div>
    </div>
    <div class="form-group">
        <label for="content">Insert Content</label>
        <textarea name="contenido" id="contenido">{{$post->contenido}}</textarea>
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
        <a href="{{url('post')}}" class="btn btn-primary">Regresar</a>
    </div>
</form>

<!--Campo para cambiar la entrada de texto-->
<script>
CKEDITOR.replace( 'contenido' );
</script>

@endsection