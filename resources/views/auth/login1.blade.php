@extends('layouts.app1')

@section('content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Admin</b>Vuivivu</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">{{ session('error')?session('error'):'Sign in to start your session' }}</p>
  
        <form action="{{ route('login') }}" method="post">
            @csrf

          <div class="input-group mb-3">
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password" >
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
              @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        {{-- <div class="social-auth-links text-center mt-2 mb-3">
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div> --}}
        <!-- /.social-auth-links -->
        {{-- @if (Route::has('password.request'))
        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        @endif
        @if (Route::has('register'))
        <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
        </p>
        @endif --}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection