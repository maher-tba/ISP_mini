@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <!-- /.card -->
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">المستخدمين</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الصلاحيات</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr >
                                <td >{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{implode(',',$user->Roles()->get()->pluck('name_ar')->toArray())}}</td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        @can('users-edit')
                                        <a href="{{URL('/users/'.$user->id.'/edit')}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('users-delete')
                                            <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button  class="fabutton btn btn-danger" type="submit"><a class="btn btn-danger text-white"><i class="fas fa-trash"></i></a></button>
                                            </form>
                                        @endcan
                                        @can('users-add')
                                            <a href="{{URL('/addUser')}}" class="btn btn-success"><i class="fas fa-plus"></i></a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
</div>
@endsection
