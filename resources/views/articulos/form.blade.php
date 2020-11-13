<div class="form-group">
<label for="Codigo" class="control-label">{{'Codigo'}}</label>
<input type="text" name="Codigo" id="Codigo" class="form-control" value="{{isset($articulo->Codigo)?$articulo->Codigo:''}}">
</div>

<div class="form-group">
<label for="Nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre" class="form-control" value="{{isset($articulo->Nombre)?$articulo->Nombre:''}}">
</div>

<div class="form-group">
<label for="Valor" class="control-label">{{'Valor'}}</label>
<input type="text" name="Valor" id="Valor" class="form-control" value="{{isset($articulo->Valor)?$articulo->Valor:''}}">
</div>

<div class="form-group">
<label for="Stock" class="control-label">{{'Stock'}}</label>
<input type="number" name="Stock" id="Stock" class="form-control" value="{{isset($articulo->Stock)?$articulo->Stock:''}}">
</div>

<div class="form-group">
<label for="Descripcion" class="control-label">{{'Descripcion'}}</label>
<input type="text" name="Descripcion" id="Descripcion" class="form-control" value="{{isset($articulo->Descripcion)?$articulo->Descripcion:''}}">
</div>

<div class="form-group">
<label for="Descripcion" class="control-label">{{'Fecha'}}</label>
<input type="in" name="Fecha" id="Descripcion" class="form-control" value="{{$mytime = Carbon\Carbon::now()}}" >
</div>

<div class="form-group">
<label for="Foto" class="control-label">{{'Foto'}}</label>
@if(isset($articulo->Foto))
<br/>
<img class="img img-thumbnail img-fluid" src="{{ asset('storage').'/'. $articulo->Foto}}" alt="" width="150">
<br/>
@endif
<input type="file" name="Foto" id="Foto" class="form-control" value="">
</div>
<br/>
<input type="submit" class="btn btn-success" value="{{ $Modo== 'crear' ? 'Agregar':'Modificar'}}">

<a href="{{url('articulos')}}" class="btn btn-primary">Regresar</a>
