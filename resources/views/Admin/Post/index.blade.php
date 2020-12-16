@extends('admin.layout.dashboard')

@section('content')

<!-- Titulo + Boton create -->
  <div class="row py-lg-2">
    <div class="col-md-6">
      <h2>Listado de Post</h2>
    </div>
    <div class="col-md-6">
      <a href="{{url('./post/create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear Nuevo Post</a>
    </div>
  </div>


  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>
<!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
          Post Publicados
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Titulo</th>
              <th>Contenido</th>
              <th>Imagen</th>
              <th>Usuario</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Titulo</th>
              <th>Contenido</th>
              <th>Imagen</th>
              <th>Usuario</th>
              <th>Acciones</th>
            </tr>
          </tfoot>
          <tbody>
          @foreach($posts as $post)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$post->titulo}}</td>
              <td>{!!$post->contenido!!}</td>
              <td>
                <img src="{{ asset('storage').'/'. $post->imagen}}" alt="" class="img img-thumbnail img-fluid" width="100">    
            </td>
               <td>{{$post->user->name}}</td>
              <td><a href="{{url('/post/'.$post->id.'/edit')}}"><i class="fa fa-edit"></i>
              </a>     
              <form method="post" action="{{url('/post/'.$post->id)}}" style="display:inline">
                
              {{csrf_field() }}
              {{ method_field('DELETE')}}
              <a href="#"  data-toggle="modal" data-target="#deleteModal" data-postid="{{$post['id']}}"><i class="fas fa-trash-alt"></i></a>
            </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
</div>
@endsection

<!-- delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you shure you want to delete this?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">Select "delete" If you realy want to delete this post.</div>
        <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <form method="POST" action="/posts/">
            @method('DELETE')
            @csrf
            <input type="hidden" id="post_id" name="post_id" value="">
            <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Delete</a>
        </form>
        </div>
    </div>
    </div>
</div>