<form action="{{url('/empleados/'.$empleado->id)}}" method="post" enctype="multipart/form-data">

{{csrf_field()}}
{{method_field('PATCH')}}

@include('empleados.form',['Modo'=>'editar'])

</form>