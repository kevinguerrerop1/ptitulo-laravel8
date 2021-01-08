
  @extends('admin.layout.dashboard')

  @section('content')
      
  
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Panel de informacion</li>
</ol>

<!-- Icon Cards-->
{{-- <div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-comments"></i>
        </div>
        <div class="mr-5"></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-list"></i>
        </div>
        <div class="mr-5">11 New Tasks!</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-shopping-cart"></i>
        </div>
        <div class="mr-5">123 New Orders!</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-danger o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-life-ring"></i>
        </div>
        <div class="mr-5">13 New Tickets!</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
</div> --}}

<!-- Area Chart Example-->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-chart-area"></i>
    Area De Informacion</div>
    <div class="card-body">
      <canvas id="myArea" width="100%" height="30"></canvas>
      <div id="chart-container"></div>
      <script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
            var resultados = <?php echo json_encode($resultados) ?>;
            Highcharts.chart('chart-container',{
                title:{
                    text:'Conteo'
                },
                xAxis:{
                    categories:['Cambio Aceite Motor + Filtro', 'Cambio Filtro Aire Niveles' , 'Cambio Filtro Polen' , 'Cambio Bujias', 'Cambio Aceite Caja Cambio', 'Cambio Aceite Diferencial','Inspección Niveles','Inspección Correas','Inspección Filtro Aire','Inspección Frenos/Suspensión']
  
                },
                yAxis:{
                    title:{
                        text:'Numero'
                    }
                },
                legend:{
                    layout:'vertical',
                    align:'right',
                    verticalAlign:'middle'
                },
                plotOptions:{
                    series:{
                        allowPointSelect:true
                    }
                },
                series:[{
                    name:'Cantidad',
                    data:resultados
                }],
                responsive:{
                    rules:[{
                        condition:{
                            maxWidth:500
                        },
                        chartOptions:{
                            legend:{
                                layout:'horizontal',
                                align:'center',
                                verticalAlign:'bottom'
                            }
                        }
                    }]
                }
            });
        </script>
    </div>
</div>
<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
        Lista de Usuarios
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Rut</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Permisos</th>
            <th>Herramientas</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Rut</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Permisos</th>
            <th>Herramientas</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach($users as $user)
            @if (!\Auth::user()->hasRole('admin') && $user->hasRole('admin')) @continue;@endif
              <tr {{ Auth::user()->id == $user->id ? 'bgcolor=#ddd' : '' }}>
                <td>{{$user->id}}</td>
                <td>{{$user->name}} {{$user->ApellidoPaterno}} {{$user->ApellidoMaterno}}</td>
                <td>{{$user->Rut}}</td>
                <td>{{$user->email}}</td>
                <td>
                  @if ($user->roles->isNotEmpty())
                    @foreach ($user->roles as $role)
                        <span class="badge badge-info">{{$role->name}}</span>
                    @endforeach
                  @endif
                </td>
                <td>
                  @if ($user->permissions->isNotEmpty())
                    @foreach ($user->permissions as $permission)
                        <span class="badge badge-info">{{$permission->name}}</span>
                    @endforeach
                  @endif
                </td>
                <td>
                  <a href="{{url('/users/'.$user->id.'/')}}"><i class="fa fa-eye"></i></a>
                  <a href="{{url('/users/'.$user->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

@endsection

 