
<div class="form-group">
<label for="NombreTipoServicio" class="control-label">{{'Nombre Tipo Servicio'}}</label>
<input type="text" name="NombreTipoServicio" id="NombreTipoServicio" 
class="form-control {{$errors->has('NombreTipoServicio')?'is-invalid':''}}" 
value="{{isset($tiposervicio->NombreTipoServicio)?$tiposervicio->NombreTipoServicio:old('NombreTipoServicio')}}">
{!! $errors->first('NombreTipoServicio',' <div class="invalid-feedback">:message</div>') !!}
</div>

<br/>
<input type="submit" class="btn btn-success" value="{{ $Modo== 'crear' ? 'Agregar':'Modificar'}}">

<a href="{{url('tiposervicios')}}" class="btn btn-primary">Regresar</a>
