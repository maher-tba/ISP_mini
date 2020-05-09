@extends('layouts.admin_layout.admin_layout')

@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">
        <!-- Content Header (Page head) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>403 دخول خاطئ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">الصفحة الرئيسية</a></li>
                            <li class="breadcrumb-item active">403 دخول خاطئ</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-danger">403</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! دخول خاطئ.</h3>

                    <p>
                        انت تحاول الدخول الى صفحة لا تملك الصلاحية للدخول اليها
                        الرجاء الطلب من المدير اعطائك الاذن للدخول هنا
                    </p>
                    <a class="btn btn-primary" href="/">الصفحة الرئيسية</a>

                </div>
            </div>
            <!-- /.error-page -->

        </section>
        <!-- /.content -->
    </div>
@endsection