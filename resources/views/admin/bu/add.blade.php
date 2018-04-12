@extends('admin.layouts.layout')
@section('title')
اضف عقار
@endsection

@section('header')

@endsection
@section('content')
    <section class="content-header">
        <h1>
            اضف عقار
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسيه</a></li>
            <li><a href="{{url('/adminpanel/bu')}}">التحكم في العقارات</a></li>
            <li class="active"><a href="{{url('/adminpanel/bu/create')}}">اضافه عقار جديد</a></li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">اضف عقار جديد</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form class="form-horizontal" method="POST" action="{{url('/adminpanel/bu')}}" enctype="multipart/form-data">
                             @include('admin.bu.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer')

@endsection