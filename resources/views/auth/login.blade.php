@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-lg-4 mt-5 ">

            <div class="login-logo">
                <a href="#"><b>EL</b>com</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">تسجيل دخول</p>

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
                                        تذكر كلمة المرور
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">تسجيل دخول</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>


                    <!-- /.social-auth-links -->

                    <p class="mb-1">
{{--                        todo forgot-password--}}
{{--                        <a href="forgot-password.html">I forgot my password</a>--}}
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
