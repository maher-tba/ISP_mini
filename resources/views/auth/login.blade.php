@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-lg-4 mt-5 ">

            <div class="login-logo">
                <a href="#"><b>Admin</b>LTE</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
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


                    <!-- /.social-auth-links -->

                    <p class="mb-1">
                        <a href="forgot-password.html">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="register.html" class="text-center">Register a new membership</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>


            <!-- jQuery -->
            <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
            <!-- Bootstrap 4 -->
            <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
            <!-- AdminLTE App -->
            <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
        </div>
    </div>
</div>
@endsection
