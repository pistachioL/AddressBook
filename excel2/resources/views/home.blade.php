@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">主页</div>



               <a href="{{url('show')}}"> 查看</a>  
                <a href="{{url('upload')}}"> Excel上传 </a> 
                <a href="{{url('create')}}"> 逐个上传 </a>


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
