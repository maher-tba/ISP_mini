@extends('layouts.admin_layout.admin_layout')
@section('styles')
    @parent
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-lg-4 mt-5 ">

            <div class="login-logo">
                <p class="login-box-msg">   <strong>{{$user->name}}</strong></p>
            </div>
            <!-- /.edit-card -->
            <div class="card">
                <div class="card-body login-card-body">
                    <form method="post" action="{{route('users.update',$user)}}">
                        @csrf
                        {{ method_field('PUT') }}

                                <form action="../../index.html" method="post">
                                    <div class="input-group mb-3">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ $user->email }}" required autocomplete="email">

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

                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckboxPassword" name="password_changed[]" value="true">
                                        <label for="customCheckboxPassword" class="custom-control-label">تغيير كلمة السر</label>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror" name="password" readonly="true">

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
                                    <div class="input-group mb-3">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" readonly="true" >
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <p class="float-right "> صلاحيات المستخدم  </p>
                                    </div>
                                @foreach($roles as $role)

                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="customCheckbox{{$role->id}}" name="roles[]" value="{{ $role->id }}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                            <label for="customCheckbox{{$role->id}}" class="custom-control-label">{{$role->name_ar}}</label>
                                        </div>
                                    @endforeach

                                    <div class="input-group mb-3 mt-3">
                                        <!-- /.col -->
                                        <button type="submit" class="btn btn-success btn-block ">تعديل</button>
                                        <!-- /.col -->
                                    </div>
                                </form>
                            <!-- /.form-box -->
                    </form>
                </div>
                <!-- /.edit-card-body -->
            </div>

        </div>
    </div>
</div>
@section('footer_js')

    {{--#################### start pssword change  #####################--}}
    <!-- page script -->
    <script>
        $(document).ready(function () {
            //checkbox password check
            $('#customCheckboxPassword').change(function() {
                if ($(this).prop('checked')) {
                    $('#password').prop('readonly', false);
                    $('#password-confirm').prop('readonly', false);
                }
                else {
                    $('#password').prop('readonly', true);
                    $('#password-confirm').prop('readonly', true);
                }
            });
        });
    </script>
    {{--#################### end  pssword change #####################--}}

@endsection
@endsection
