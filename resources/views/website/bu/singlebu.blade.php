@extends('layouts.app')
@section('title')
العقار
    |
{{$buInfo->bu_name}}
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
                    <li><a href="{{url('/show_all_buildings')}}">كل العقارات</a></li>
                    <li><a href="{{url('/single_building/'.$buInfo->id)}}">{{$buInfo->bu_name}} </a></li>
                </ol>
                <div class="profile-content">
                    <h1>{{$buInfo->bu_name}}</h1>
                    <hr>
                    <div class="btn-group">
                        <div class="pull-right">
                            <a href="{{url('/search?bu_square='.$buInfo->bu_square)}}" class="btn btn-default"> المساحه :{{$buInfo->bu_square}} متر</a>
                            <a href="{{url('/search?bu_price='.$buInfo->bu_price)}}" class="btn btn-default"> سعر العقار :{{$buInfo->bu_price}} جنيه </a>
                            <a href="{{url('/search?bu_place='.$buInfo->bu_place)}}" class="btn btn-default"> المنطقه : {{bu_place()[$buInfo->bu_place] }} </a>
                            <a href="{{url('/search?rooms='.$buInfo->rooms)}}" class="btn btn-default"> عدد الغرف :{{$buInfo->rooms}} غرفه</a>
                            <a href="{{url('/search?bu_rent='.$buInfo->bu_rent)}}" class="btn btn-default"> نوع العمليه :{{bu_rent()[$buInfo->bu_rent] }}</a>
                            <a href="{{url('/search?bu_type='.$buInfo->bu_type)}}" class="btn btn-default"> نوع العقار :{{bu_type()[$buInfo->bu_type] }}</a>
                        </div>

                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54226aed398abab9" async="async"></script>
                        <div class="pull-left">
                            <a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url={{url('/single_building/'.$buInfo->id)}}&pubid=ra-54226aed398abab9&ct=1&title={{$buInfo->bu_name}}|{{getsetting()}}&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/facebook.png" border="0" alt="Facebook"></a>
                            <a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url={{url('/single_building/'.$buInfo->id)}}&pubid=ra-54226aed398abab9&ct=1&title={{$buInfo->bu_name}}|{{getsetting()}}&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/twitter.png" border="0" alt="Twitter"></a>
                            <a href="https://api.addthis.com/oexchange/0.8/forward/google/offer?url={{url('/single_building/'.$buInfo->id)}}&pubid=ra-54226aed398abab9&ct=1&title={{$buInfo->bu_name}}|{{getsetting()}} &pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/google_plusone_share.png" border="0" alt="Google+"></a>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                    <hr>
                    <img src="{{checkImageExist($buInfo->image)}}" alt="صوره العقار {{$buInfo->bu_name}}" class="img-responsive"/>
                    <hr>
                    <p>
                        {!! nl2br($buInfo->bu_large_dis) !!}
                    </p>
                    <hr>
                    <div id="map" style="width:100%;height:500px"></div>
                </div>
                <br>
                <div class="profile-content">
                    <h3>عقارات اخري قد تهمك </h3>
                    <hr>
                    @include('website.bu.sharefile',['bu'=>$same_rent])
                    @include('website.bu.sharefile',['bu'=>$same_type])

                </div>
            </div>
           @include('website.bu.rightSearch')
        </div>
    </div>
    <br>
    <br>


    

@endsection

@section('footer')
    <script>
        function myMap() {
            var mapCanvas = document.getElementById("map");
            var myCenter = new google.maps.LatLng({{$buInfo->bu_langtuide}},{{$buInfo->bu_latitde}});
            var mapOptions = {center: myCenter, zoom: 5};
            var map = new google.maps.Map(mapCanvas,mapOptions);
            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE
            });
            marker.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlK7dm0xjSFLFHBtrc4FxYUxDaopchJxM&callback=myMap"></script>
@endsection
