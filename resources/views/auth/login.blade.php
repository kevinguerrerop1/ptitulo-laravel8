@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="d-none d-md-flex col-md-4 col-lg-6" style="background-image: url('img/about2-bg.jpg')"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">Bienvenido Nuevamente a <img src="logo/logo_login.png" width="150"></h3>
                <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Ingrese Email" required autocomplete="email" autofocus>
                          <label for="inputEmail">{{ __('Ingrese Email') }}</label>
                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                      </div>
                      <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Ingrese Password" name="password" required autocomplete="current-password">
                          <label for="inputPassword">{{ __('Ingrese Password') }}</label>
                            @error('password')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                      </div>
                      {{-- <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                        <label class="custom-control-label" for="customCheck1">Recuerda tu password</label>
                      </div> --}}
                        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Ingresar</button>
                          <div class="text-center">
                            @if (Route::has('password.request'))
                              <a class="small" href="{{ route('password.request') }}">Forgot password?</a></div>
                            @endif
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection