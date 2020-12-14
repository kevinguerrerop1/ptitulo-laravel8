@extends('admin.layout.dashboard')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> 
            @endforeach
        </ul>
    </div>
@endif

<form action="{{url('/post')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
    
    <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Title..." 
        value="{{isset($post->titulo)?$post->titulo:old('titulo')}}">
    </div>
    <div class="form-group">
        <label for="imagen">Select Image</label>
        <input type="file" name="imagen" class="form-control-file" id="imagen">
    </div>
    <div class="form-group">
        <label for="contenido">Insert Content</label>
        <textarea name="contenido" id="contenido">{{ old('contenido') }}</textarea>
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
        <a href="{{url('post')}}" class="btn btn-primary">Regresar</a>
    </div>
</form>

<script>
    CKEDITOR.replace( 'contenido' );
</script>


@endsection