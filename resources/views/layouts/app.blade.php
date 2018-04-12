<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('website/css/bootstrap.min.css" rel="stylesheet')}}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('website/css/flexslider.css')}}" rel="stylesheet" />
    <link href="{{asset('website/css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('website/css/font-awesome.min.css')}}">
    <script src="{{asset('website/js/jquery.min.js')}}"></script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'>
    <style type="text/css">
        *{
           font-family: 'Droid Arabic Kufi', serif;
        }
    </style>
    <title>
       {{--{{getsetting()}}--}}
        |
        @yield('title')
    </title>
    <!-- Styles -->
    @yield('header')
</head>
<body style="direction: rtl">
<div class="header">
    <div class="container"> <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-paper-plane"></i> ONE</a>
        <div class="menu pull-left"> <a class="toggleMenu" href="#"><img src="{{asset('/website/images/nav_icon.png')}}" alt="" /> </a>
            <ul class="nav" id="nav">
                <li class="current"><a href="{{url('/home')}}">الرئيسيه</a></li>
                <li><a href="{{url('/show_all_buildings')}}">كل العقارات</a></li>
                {{--الايجار--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false">
                       ايجار <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu" style="min-width: 80px;">
                        @foreach(bu_type() as $keyType=>$type)
                            <li style="width: 100%"><a href="{{url('/search?bu_rent=0&bu_type='.$keyType)}}">{{$type}}</a></li>
                        @endforeach
                    </ul>
                </li>
                {{--التمليك--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false">
                        تمليك <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu" style="min-width: 80px;">
                        @foreach(bu_type() as $keyType=>$type)
                            <li style="width: 100%"><a href="{{url('/search?bu_rent=1&bu_type='.$keyType)}}">{{$type}}</a></li>
                        @endforeach
                    </ul>
                </li>
                {{----}}
                <li><a href="{{url('/contact')}}">اتصل بنا</a></li>
                @guest
                    <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                    <li><a href="{{ route('register') }}">عضويه جديده</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu"   style="min-width: 118px;">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">تسجيل الخروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                <div class="clear"></div>
            </ul>

        </div>
    </div>
</div>


    @yield('content')

<div class="footer" >
    <div class="footer_bottom" style="background: #2f2530;">
        <div class="follow-us">
            <a class="fa fa-facebook social-icon" href="{{getsetting('facebook')}}"></a>
            <a class="fa fa-twitter social-icon" href="{{getsetting('twitter')}}"></a>
            <a class="fa fa-youtube social-icon" href="{{getsetting('youtube')}}"></a>
        </div>
        <div class="copy">
            <p>Copyright &copy; 2015 Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></p>
        </div>
    </div>
</div>
<!-- Scripts -->
<script type="text/javascript" src="{{asset('/website/js/responsive-nav.js')}}"></script>
<script src="{{asset('/website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/website/js/jquery.flexslider.js')}}"></script>
@yield('footer')
</body>
</html>
