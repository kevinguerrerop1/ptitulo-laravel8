<div class="form-group">
<label for="Nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre" 
class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" 
value="{{isset($cliente->Nombre)?$cliente->Nombre:old('Nombre')}}">
{!! $errors->first('Nombre',' <div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="ApellidoPaterno" class="control-label">{{'Apellido Paterno'}}</label>
<input type="text" name="ApellidoPaterno" id="ApellidoPaterno" 
class="form-control {{$errors->has('ApellidoPaterno')?'is-invalid':''}}" 
value="{{isset($cliente->ApellidoPaterno)?$cliente->ApellidoPaterno:old('ApellidoPaterno')}}">
{!! $errors->first('Apellido Paterno',' <div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="ApellidoMaterno" class="control-label">{{'Apellido Materno'}}</label>
<input type="text" name="ApellidoMaterno" id="ApellidoMaterno" 
class="form-control {{$errors->has('ApellidoMaterno')?'is-invalid':''}}" 
value="{{isset($cliente->ApellidoMaterno)?$cliente->ApellidoMaterno:old('ApellidoMaterno')}}">
{!! $errors->first('Apellido Materno',' <div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Rut" class="control-label">{{'Rut'}}</label>
<input type="text" name="Rut" id="Rut" 
class="form-control {{$errors->has('Rut')?'is-invalid':''}}" 
value="{{isset($cliente->Rut)?$cliente->Rut:old('Rut')}}">
{!! $errors->first('Rut',' <div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Correo" class="control-label">{{'Correo'}}</label>
<input type="email" name="Correo" id="Correo" 
class="form-control {{$errors->has('Correo')?'is-invalid':''}}" 
value="{{isset($cliente->Correo)?$cliente->Correo:old('Correo')}}">
{!! $errors->first('Correo',' <div class="invalid-feedback">:message</div>') !!}
</div>

<br/>

<input type="submit" class="btn btn-success" value="{{ $Modo== 'crear' ? 'Agregar':'Modificar'}}">

<a href="{{url('clientes')}}" class="btn btn-primary">Regresar</a>
