
<label for="Nombre">{{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre" 

value="{{isset($empleado->Nombre)?$empleado->Nombre:''}}">

<br/>
<label for="ApellidoPaterno">{{'ApellidoPaterno'}}</label>
<input type="text" name="ApellidoPaterno" id="ApellidoPaterno" 
value="{{isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:''}}">
<br/>
<label for="ApellidoMaterno">{{'ApellidoMaterno'}}</label>
<input type="text" name="ApellidoMaterno" id="ApellidoMaterno" 
value="{{isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:''}}">
<br/>
<label for="Correo">{{'Correo'}}</label>
<input type="email" name="Correo" id="Correo" 
value="{{isset($empleado->Correo)?$empleado->Correo:''}}">
<br/>
<label for="Foto">{{'Foto'}}</label>

@if(isset($empleado->Foto))
<br/>
<img src="{{ asset('storage').'/'. $empleado->Foto}}" alt="" width="200">
<br/>
@endif

<input type="file" name="Foto" id="Foto" value="">
<br/>
<input type="submit" value="{{ $Modo== 'crear' ? 'Agregar':'Modificar'}}">

<a href="{{url('empleados')}}">Regresar</a>
