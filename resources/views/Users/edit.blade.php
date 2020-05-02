@extends('layouts.admin_layout.admin_layout')

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
                                    <p class="float-right  "> اعدادات التلغرام  </p>
                                    <div class="input-group mb-3">
                                        <input id="token" type="text" class="form-control" value="{{$user->token}}" name="token" placeholder=" token" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fab fa-telegram-plane"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input id="chat_id" type="text" class="form-control" name="chat_id" value="{{$user->chat_id}}" placeholder=" Chat id" autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fab fa-telegram-plane"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="float-right "> صلاحيات المستخدم  </p>
                                    </div>

                                @foreach($roles as $role)

                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="roles[]" value="{{ $role->id }}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                            <label for="customCheckbox1" class="custom-control-label">{{$role->name_ar}}</label>
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
