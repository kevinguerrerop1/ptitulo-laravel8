
<div class="form-group">
<label for="Patente" class="control-label">{{'Patente'}}</label>
<input type="text" name="Patente" id="Patente" 
class="form-control {{$errors->has('Patente')?'is-invalid':''}}" 
value="{{isset($vehiculo->Patente)?$vehiculo->Patente:old('Patente')}}">
{!! $errors->first('Patente',' <div class="invalid-feedback">:message</div>') !!}
</div>



<br>
<input type="submit" class="btn btn-success" value="{{ $Modo== 'crear' ? 'Agregar':'Modificar'}}">

<a href="{{url('vehiculos')}}" class="btn btn-primary">Regresar</a>