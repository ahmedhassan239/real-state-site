@extends('admin.layouts.layout')
@section('title')
  تعديل العضو
    {{$user->name}}
@endsection

@section('header')

@endsection
@section('content')
    <section class="content-header">
        <h1>تعديل العضو
            {{$user->name}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسيه</a></li>
            <li><a href="{{url('/adminpanel/users/'.$user->id.'/edit')}}">التحكم في الاعضاء</a></li>
            <li class="active"><a href="{{url('/adminpanel/users/create')}}">تعديل العضو{{$user->name}}</a></li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 ">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">تعديل العضو {{$user->name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        {!! Form::model($user,['route'=>['update_user',$user->id],'method'=>'PATCH']) !!}
                             @include('admin.user.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-xs-12 ">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">تغير كلمه المرور الخاصه بالعضو {{$user->name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        {!! Form::open(['url'=>'/adminpanel/user/changepassword/','method'=>'post']) !!}
                        <input type="hidden" value="{{$user->id}}" name="user_id">
                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" placeholder="كلمه المرور" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>

                        <div class="text2">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-sign-in" style="color: #ffffff;"></i>
                             تغير كلمه المرور
                                </button>
                                @if($user->id !=1)
                                <a href="{{url('/adminpanel/users/'.$user->id.'/delete/')}}"><i class='fa fa-trash'></i>حذف العضو</a>
                                @endif
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer')

@endsection