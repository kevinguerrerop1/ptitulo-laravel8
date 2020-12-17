
@extends('layouts.app')

@section('content')

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>CHECK-AR</h1>
            <span class="subheading">Consultar tus datos nunca fue tan facil</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
        @foreach ($posts as $post) 
      <div class="col-md-4">
       <img src="{{ asset('storage').'/'. $post->imagen}}" alt="" class="img img-thumbnail img-fluid" width="auto">
      </div>
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              {{$post->titulo}}
            </h2>
            <h3 class="post-subtitle">
              {!!$post->contenido!!}
            </h3>
          </a>
          <p class="post-meta">Publicado por
            <a href="#">{{$post->user->name}}</a>
            en {{$post->created_at}}</p>
        </div>
          <hr>
          <hr>
      </div>
        @endforeach
    </div>
  </div>
  <hr>
  @endsection

 