<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Check-AR</title>

  <!-- Editor de texto avanzado -->
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-tagsinput.css') }}" >

  <!-- Page level plugin CSS-->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="{{ asset('css/admin/sb-admin.css') }}">

  @yield('css_role_page')
    
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="http://localhost:82/laravel/ptitulo/public/" > <img src="https://kethasoft.cl/img/logo_small.png" width="140"></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        
        <div class="input-group-append">


          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
          @auth
            {{ Auth::user()->name }} {{ Auth::user()->roles->isNotEmpty() ? Auth::user()->roles->first()->name : "" }}
          @endauth
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>
  
    <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      @can('isAdmin')
      <li class="nav-item active">
        <a class="nav-link" href="{{asset('/admin')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Area de Informacion</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href={{asset('roles')}}>
          <i class="fas fa-unlock-alt"></i>
          <span>Roles</span></a>
        </li>

      <li class="nav-item">
        <a class="nav-link" href={{asset('users')}}>
          <i class="fa fa-users" aria-hidden="true"></i>
          <span>Usuarios</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href={{asset('post')}}>
          <i class="fa fa-align-left" aria-hidden="true"></i>
          <span>Post</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href={{asset('empleados')}}>
          <i class="fa fa-user" aria-hidden="true"></i>
          <span>Empleados</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href={{asset('clientes')}}>
          <i class="fa fa-user" aria-hidden="true"></i>
          <span>Clientes</span></a>
      </li>
      @endcan

      @canany(['isAdmin','isEmpleado'])
       <li class="nav-item">
        <a class="nav-link" href={{asset('servicios')}}>
          <i class="fa fa-cogs" aria-hidden="true"></i>
          <span>Servicios</span></a>
      </li>
      @endcanany

      @canany(['isAdmin','isEmpleado','isCliente'])
      <li class="nav-item">
        <a class="nav-link" href={{asset('vehiculos')}}>
          <i class="fa fa-car" aria-hidden="true"></i>
          <span>Vehiculos</span></a>
      </li>
      @endcanany
    </ul>

    <div id="content-wrapper">
        <div class="container-fluid">

  @yield('content')

    </div>
      <!-- /.container-fluid -->

   <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Check-Ar 2020</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

   <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <a class="btn btn-primary" href="#"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>

          {{-- <a class="btn btn-primary" href="login.html">Logout</a> --}}
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/admin/sb-admin.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{asset('js/admin/demo/datatables-demo.js')}}"></script>

  
  @yield('js_role_page')
  @yield('js_user_page')

</body>

</html>