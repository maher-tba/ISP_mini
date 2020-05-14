@extends('layouts.admin_layout.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <!-- /.card -->
            <div class="card card-secondary">
                <div class="card">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="ion ion-clipboard mr-1"></i>
                            To Do List
                        </h3>

                        <div class="card-tools">
                            <ul class="pagination pagination-sm">
                                <li class="page-item"><a href="#" class="page-link">«</a></li>
                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">»</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ul class="todo-list ui-sortable" data-widget="todo-list">
                            @foreach($tasks as $task)
                                <li>
                                    <!-- drag handle -->
                                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                                    <!-- checkbox -->
                                    <div class="icheck-primary d-inline ml-2">
                                        <input type="checkbox" value="" name="todo1" id="todoCheck1">
                                        <label for="todoCheck1"></label>
                                    </div>
                                    <!-- todo text -->
                                    <span class="text">{{$task->description}}</span>
                                    <!-- Emphasis label -->
                                    <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-trash-o"></i>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">

                        <button type="button" class="btn btn-secondary  float-right" data-toggle="modal" data-target="#modal-secondary">
                            <i class="fas fa-plus"></i> اضافة مهمة</button>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
{{--############################# START model add task ########################--}}
<form method="POST" action="{{route('tasks.store')}}">
    @csrf
    <div class="modal fade" id="modal-secondary">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h4 class="modal-title" id="name">انشاء مهمة</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="description">

                    <div class="form-group row">
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control text-right" name="name" id="name" placeholder="نوع المهمة">
                        </div>
                        <label for="inputEmail3"  class="col-sm-2 col-form-label">نوع المهمة</label>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-right"name="description" id="description" placeholder="الوصف">
                        </div>
                        <label for="description" class="col-sm-2 col-form-label">الوصف</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-outline-light">حفظ</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>

{{--############################# END model add task ########################--}}

@endsection
