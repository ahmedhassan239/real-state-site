@extends('layouts.app')
@section('title')
    اهلا بك
@endsection
@section('header')
    <style>
        .banner{
            background: url("{{checkImageExist(getsetting('main_slider'),'website/images/slider/','/website/images/slider/')}}") no-repeat center!important;

            min-height: 500px;
            width: 100%;
            -webkit-background-size: 100%;
            -moz-background-size: 100%;
            -o-background-size: 100%;
            background-size: 100%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            padding-bottom: 100px;
        }
    </style>
    {{--test bransh ahmed--}}
    <link rel="stylesheet" href="{{Request::root()}}/main/css/reset.css">
    <link rel="stylesheet" href="{{Request::root()}}/main/css/style.css"> <!-- Resource style -->
    <script src="{{Request::root()}}/main/js/modernizr.js"></script> <!-- Modernizr -->
@endsection
@section('content')
    <div class="banner text-center" >
        <div class="container">
            <div class="banner-info">
                <h1>
                    {{getsetting()}}
                </h1>
                <p>

                        {!! Form::open(['url'=>'search','method'=>'get']) !!}
                             <div class="row">
                                 <div class="col-lg-3"> {!! Form::text("bu_price_from",null,['class'=>'form-control','placeholder'=>'سعر العقار من']) !!}</div>
                                 <div class="col-lg-3">{!! Form::text("bu_price_to",null,['class'=>'form-control','placeholder'=>'سعر العقار الي ']) !!}</div>
                                 <div class="col-lg-3">{!! Form::select("rooms",room_num(),null,['class'=>'form-control','placeholder'=>'عدد الغرف']) !!}</div>
                                 <div class="col-lg-3">{!! Form::text("bu_square",null,['class'=>'form-control','placeholder'=>'مساحه العقار']) !!}</div>
                             </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-4"> {!! Form::select("bu_place",bu_place(),null,['class'=>'form-control','placeholder'=>'منطقه العقار']) !!}</div>
                                <div class="col-lg-4"> {!! Form::select("bu_rent",bu_rent(),null,['class'=>'form-control','placeholder'=>'نوع العمليه']) !!}</div>
                                <div class="col-lg-4">{!! Form::select("bu_type",bu_type(),null,['class'=>'form-control','placeholder'=>'نوع العقار']) !!}</div>

                            </div>
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4"> {!! Form::submit("ابحث",['class'=>'banner_btn' ,'style'=>'background:#312d44;']) !!}</div>
                                <div class="col-lg-4"></div>
                            </div>

                        {!! Form::close() !!}

                    <!-- END MENU -->
                </div>
                </p>
                <a class="banner_btn" href="{{url('/show_all_buildings')}}" style="background: #312d44;">المزيد</a> </div>
        </div>
<div class="clearfix"></div>
    <br>
    {{--<div class="row">--}}
        {{--<div class="col-md-2"></div>--}}
        {{--<div class="col-md-8">--}}
            <div class="main">
                {{--<div class="row">--}}
                <ul class="cd-items cd-container">
                    @foreach(\App\Bu::where('bu_status',1)->get() as $bu)
                        {{--<div class="col-md-2">--}}
                        <li class="cd-item effect8">
                            <img src="{{checkImageExist($bu->image,'website/thumb/','/website/thumb/')}}" alt="{{$bu->name}}" title="{{$bu->name}}">
                            <a href="#0" data-id="{{$bu->id}}" class="cd-trigger" title="{{$bu->name}}">نبذه سريعه</a>
                        </li> <!-- cd-item -->
                        {{--</div>--}}
                    @endforeach
                </ul> <!-- cd-items -->
            </div>
        {{--</div>--}}
        {{--<div class="col-md-2"></div>--}}
    {{--</div>--}}

        <div class="cd-quick-view">
            <div class="cd-slider-wrapper">
                <ul class="cd-slider">
                    <li><img src="" class="imagebox" alt="Product 1"></li>
                </ul> <!-- cd-slider -->


            </div> <!-- cd-slider-wrapper -->

            <div class="cd-item-info">
                <h2 class="titlebox"></h2>
                <p class="disbox"></p>

                <ul class="cd-item-action">
                    <li><a href="" class="add-to-cart pricebox"></a></li>
                    <li><a href="#0" class="morbox">اقرأ المزيد</a></li>
                </ul> <!-- cd-item-action -->
            </div> <!-- cd-item-info -->
            <a href="#0" class="cd-close">Close</a>
        </div> <!-- cd-quick-view -->

    </div>
@endsection
@section('footer')
    <script src="{{Request::root()}}/main/js/jquery-2.1.1.js"></script>
    <script src="{{Request::root()}}/main/js/velocity.min.js"></script>
    <script>
        function urlHome() {
            return '{{ Request::root() }}';
        }
        function noImageUrl() {
            return '{{getsetting('no_image') }}';
        }
    </script>
    <script src="{{Request::root()}}/main/js/main.js"></script>
@endsection