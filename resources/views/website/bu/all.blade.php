@extends('layouts.app')
@section('title')
كل العقارات
@endsection
@section('header')
    <link rel="stylesheet" href="{{asset('cus/buall.css')}}">
    <style type="text/css">
        .breadcrumb{
            background-color: #FFF;
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="row profile">
            <div class="col-md-9">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">الرئيسيه</a></li>
                    @if(isset($array))
                        @if(!empty($array))
                            @foreach($array as $key=>$value)
                            <li><a href="{{url('/search?'.$key.'='.$value)}}">{{ searchNameFields()[$key]}}   <i class="fa fa-hand-o-left" aria-hidden="true"></i>
                                    @if($key == 'bu_rent')
                                        {{bu_rent()[$value]}}
                                    @elseif($key == 'bu_type')
                                        {{bu_type()[$value]}}
                                    @elseif($key == 'bu_place')
                                        {{bu_place()[$value]}}
                                        @else
                                        {{$value}}
                                    @endif
                                </a></li>
                            @endforeach
                            @endif
                        @endif

                </ol>
                <div class="profile-content">
                    @include('website.bu.sharefile',['bu'=>$buAll])
                    <div class="text-center">
                            {{$buAll->appends(Request::except('page'))->render()}}
                    </div>
                </div>
            </div>
            @include('website.bu.rightSearch')
        </div>
    </div>
    <br>
    <br>

@endsection
