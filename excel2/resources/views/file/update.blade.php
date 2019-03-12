@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">修改通信录信息</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                       <!--  @include('file._form'); -->
                        <!-- 把数据提交到指定方法 -->
                            {{ csrf_field() }}

                        <!-- 逐个上传 -->
                     <form class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">中心</label>
 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Upload[department]" 
                        value="{{ old('Upload')['department'] ? old('Upload')['department'] : (isset($info->department) ? $info->department : '') }} "   id="name" placeholder="请输入中心的名字">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">中心不能为空</p>
                    </div>
                </div>

                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">姓名</label>
 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Upload[name]"
                        value="{{ old('Upload')['name'] ? old('Upload')['name'] : (isset($info->name) ? $info->name : '' )}}" id="name" placeholder="请输入学生姓名">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">姓名不能为空</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="age" class="col-sm-2 control-label">长号</label>
 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Upload[phone]" 
                        value="{{ old('Upload')['phone'] ? old('Upload')['phone'] : (isset($info->phone)? $info->phone : '' )}}" id="age" placeholder="请输入学生年龄">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">长号只能为整数</p>
                    </div>
                </div>

                    <div class="form-group">
                    <label for="age" class="col-sm-2 control-label">短号</label>
 
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Upload[short_number]"
                     value="{{ old('Upload')['short_number'] ? old('Upload')['short_number'] : (isset($info->short_number)? $info->short_number : '' )}}" id="age" placeholder="请输入学生年龄">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">短号只能为整数</p>
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
