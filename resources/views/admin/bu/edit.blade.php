@extends('admin.layouts.layout')
@section('title')
  تعديل العقار
  {{$bu->bu_name}}
@endsection

@section('header')
        {{--<link href="{{asset('cus/css/select2.css')}}" rel="stylesheet" />--}}
@endsection
@section('content')
    <section class="content-header">
        <h1>  تعديل العقار
            {{$bu->bu_name}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسيه</a></li>
            <li><a href="{{url('/adminpanel/bu/'.$bu->id.'/edit')}}">التحكم في العقارات</a></li>
            <li class="active"><a href="{{url('/adminpanel/bu/create')}}">تعديل العقار{{$bu->bu_name}}</a></li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 ">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">تعديل العقار{{$bu->bu_name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        {!! Form::model($bu,['route'=>['update',$bu->id],'method'=>'PATCH','files'=>true]) !!}
                             @include('admin.bu.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    {{--<script src="{{asset('cus/js/select2.js')}}"></script>--}}
    {{--<script type="text/javascript">--}}
        {{--$('.select2').select2();--}}
    {{--</script>--}}
@endsection