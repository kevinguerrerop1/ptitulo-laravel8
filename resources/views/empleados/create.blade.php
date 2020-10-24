<form action="{{url('/empleados')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}

@include('empleados.form',['Modo'=>'crear'])

</form>