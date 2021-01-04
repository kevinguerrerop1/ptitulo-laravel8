
<div class="form-group">
<label for="Patente" class="control-label">{{'Patente'}}</label>
<input type="text" name="Patente" id="Patente" 
class="form-control {{$errors->has('Patente')?'is-invalid':''}}" 
value="{{isset($vehiculo->Patente)?$vehiculo->Patente:old('Patente')}}">
{!! $errors->first('Patente',' <div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Anio" class="control-label">{{'Año'}}</label>
<input type="number" name="Anio" id="Anio" 
class="form-control {{$errors->has('Anio')?'is-invalid':''}}" 
value="{{isset($vehiculo->Anio)?$vehiculo->Anio:old('Anio')}}">
{!! $errors->first('Anio',' <div class="invalid-feedback">:message</div>') !!}
</div> 

<div class="form-group">
<label for="Marca" class="control-label">{{'Marca'}}</label>
<input type="text" name="Marca" id="Marca" 
class="form-control {{$errors->has('Marca')?'is-invalid':''}}" 
value="{{isset($vehiculo->Marca)?$vehiculo->Marca:old('Marca')}}">
{!! $errors->first('Marca',' <div class="invalid-feedback">:message</div>') !!}
</div> 

<div class="form-group">
<label for="Modelo" class="control-label">{{'Modelo'}}</label>
<input type="text" name="Modelo" id="Modelo" 
class="form-control {{$errors->has('Modelo')?'is-invalid':''}}" 
value="{{isset($vehiculo->Modelo)?$vehiculo->Modelo:old('Modelo')}}">
{!! $errors->first('Modelo',' <div class="invalid-feedback">:message</div>') !!}
</div> 

<div class="form-group">
<label for="Cilindrada" class="control-label">{{'Cilindrada'}}</label>
<input type="number" name="Cilindrada" id="Cilindrada" 
class="form-control {{$errors->has('Cilindrada')?'is-invalid':''}}" 
value="{{isset($vehiculo->Cilindrada)?$vehiculo->Cilindrada:old('Cilindrada')}}">
{!! $errors->first('Cilindrada',' <div class="invalid-feedback">:message</div>') !!}
</div> 

<div class="form-group">
<label for="Color" class="control-label">{{'Color'}}</label>
<input type="text" name="Color" id="Color" 
class="form-control {{$errors->has('Color')?'is-invalid':''}}" 
value="{{isset($vehiculo->Color)?$vehiculo->Color:old('Color')}}">
{!! $errors->first('Color',' <div class="invalid-feedback">:message</div>') !!}
</div> 
<br>
<input type="submit" class="btn btn-success" value="{{ $Modo== 'crear' ? 'Agregar':'Modificar'}}">

<a href="{{url()->previous()}}" class="btn btn-primary">Regresar</a>
