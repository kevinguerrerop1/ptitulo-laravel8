
<div class="form-group">
<label for="Titulo" class="control-label">{{'Titulo'}}</label>
<input type="text" name="Titulo" id="Titulo" 
class="form-control {{$errors->has('Titulo')?'is-invalid':''}}" 
value="{{isset($post->Titulo)?$post->Titulo:old('Titulo')}}">
{!! $errors->first('Titulo',' <div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Contenido" class="control-label">{{'Contenido'}}</label>
<input type="text" name="Contenido" id="Contenido" 
class="form-control {{$errors->has('Contenido')?'is-invalid':''}}" 
value="{{isset($post->Contenido)?$post->Contenido:old('Contenido')}}">
{!! $errors->first('Contenido',' <div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Imagen" class="control-label">{{'Imagen'}}</label>
@if(isset($post->Imagen))
<br/>
<img class="img img-thumbnail img-fluid" src="{{ asset('storage').'/'. $post->Imagen}}" alt="" width="150">
<br/>
@endif
<input type="file" name="Imagen" id="Imagen" class="form-control {{$errors->has('Imagen')?'is-invalid':''}}" value="">
{!! $errors->first('Foto',' <div class="invalid-feedback">:message</div>') !!}
</div>
<br/>

<input type="submit" class="btn btn-success" value="{{ $Modo== 'crear' ? 'Agregar':'Modificar'}}">

<a href="{{url('post')}}" class="btn btn-primary">Regresar</a>

<script>
    CKEDITOR.replace( 'Contenido' );
</script>