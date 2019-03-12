@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">通讯录信息上传</div>

                    <div class="panel-body">
                       <!--  <form class="form-horizontal" method="POST" action="{{url('save')}}" enctype="multipart/form-data"> -->
                       @include('file._form');
                        <!-- 把数据提交到指定方法 -->
                            {{ csrf_field() }}

                        <!-- 逐个上传 -->
                     <form class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">中心</label>
 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Upload[department]" id="name" placeholder="请输入学生姓名">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">中心不能为空</p>
                    </div>
                </div>

                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">姓名</label>
 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Upload[name]" id="name" placeholder="请输入学生姓名">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">姓名不能为空</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="age" class="col-sm-2 control-label">长号</label>
 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Upload[phone]" id="age" placeholder="请输入学生年龄">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">长号只能为整数</p>
                    </div>
                </div>

                    <div class="form-group">
                    <label for="age" class="col-sm-2 control-label">短号</label>
 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Upload[short_number]" id="age" placeholder="请输入学生年龄">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">年龄只能为整数</p>
                    </div>
                </div>


                        



                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        确认上传
                                    </button>

                                    


                                </div>
                            </div>

                        </form>
                    </div>
                


              
        </div>


    </div>
@endsection
