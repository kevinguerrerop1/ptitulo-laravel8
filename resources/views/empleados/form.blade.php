
<div class="form-group">
<label for="Nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre" class="form-control {{$errors->has('Nombre')?'is-invalid':'' }} " value="{{isset($empleado->Nombre)?$empleado->Nombre:old('Nombre')}}">

{!! $errors->first('Nombre',' <div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group">
<label for="ApellidoPaterno" class="control-label">{{'ApellidoPaterno'}}</label>
<input type="text" name="ApellidoPaterno" id="ApellidoPaterno" class="form-control" value="{{isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:''}}">
</div>

<div class="form-group">
<label for="ApellidoMaterno" class="control-label">{{'ApellidoMaterno'}}</label>
<input type="text" name="ApellidoMaterno" id="ApellidoMaterno" class="form-control" value="{{isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:''}}">
</div>

<div class="form-group">
<label for="Correo" class="control-label">{{'Correo'}}</label>
<input type="email" name="Correo" id="Correo" class="form-control" value="{{isset($empleado->Correo)?$empleado->Correo:''}}">
</div>

<div class="form-group">
<label for="Foto" class="control-label">{{'Foto'}}</label>
@if(isset($empleado->Foto))
<br/>
<img class="img img-thumbnail img-fluid" src="{{ asset('storage').'/'. $empleado->Foto}}" alt="" width="150">
<br/>
@endif
<input type="file" name="Foto" id="Foto" class="form-control" value="">
</div>
<br/>
<input type="submit" class="btn btn-success" value="{{ $Modo== 'crear' ? 'Agregar':'Modificar'}}">

<a href="{{url('empleados')}}" class="btn btn-primary">Regresar</a>
