<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
</head>
<body>
   
    <main>
        <h5 style=""><strong>Tabla De Servicio</strong></h5>
        <table class="table-striped text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Patente</th>
                <th scope="col">Tipo de Servicio</th>
                <th scope="col">Cambio Aceite</th>
                <th scope="col">Inspección Niveles</th>
                <th scope="col" >Inspección Correas</th>
                <th scope="col">Inspección Filtro Aire</th>
                <th scope="col">Inspección Frenos</th>
                <th scope="col">Cambio Filtro Aire</th>
                <th scope="col">Cambio Filtro Polen</th>
                <th scope="col">Cambio Bujias</th>
                <th scope="col">Cambio Aceite Caja Cambio</th>
                <th scope="col">Cambio Aceite Diferencial</th>
                <th scope="col">Fecha Mantencion</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{$servicio->id}}</td>
                    <td>@if ($servicio->vehiculos->isNotEmpty())
                        @foreach ($servicio->vehiculos as $vehiculo)
                            <span class="badge badge-info">{{$vehiculo->Patente}}</span>
                        @endforeach
                        @endif</td>
                    <td>{{$servicio->tiposervicios}}</td>
                    <td>{{$servicio->Caceite}}</td>
                    <td>{{$servicio->Iniveles}}</td>
                    <td>{{$servicio->Icorreas}}</td>
                    <td>{{$servicio->Iaire}}</td>
                    <td>{{$servicio->Ifrenos}}</td>
                    <td>{{$servicio->Caire}}</td>
                    <td>{{$servicio->Cpolen}}</td>
                    <td>{{$servicio->Cbujias}}</td>
                    <td>{{$servicio->Cacc}}</td>
                    <td>{{$servicio->Cad}}</td>
                    <td>{{$servicio->created_at}}</td>
                </tr>
        </tbody>
    </table>
</main>
</body>
</html>