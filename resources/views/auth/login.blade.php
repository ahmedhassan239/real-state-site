@extends('layouts.app')
@section('title')
     تسجيل الدخول
@endsection
@section('content')
    <div class="container">
        <hr>
        <div class="contact-bottom">
            <h3>
                تسجيل الدخول
            </h3>
            <hr>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="text2 {{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" placeholder="كلمه المرور" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="text2 {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" placeholder="البريد الاليكتروني" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="text2">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" style="float:right;margin-left: 10px;position: relative;"> تذكرني
                            </label>
                        </div>
                    </div>
                </div>
                <div class="text2">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-btn fa-sign-in" style="color: #ffffff;"></i>
                            تسجيل دخول
                        </button>

                        <a class="banner_btn" href="{{ route('password.request') }}">
                            هل نسيت كلمه المرور؟
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix">

        </div>
        <br>
    </div>
@endsection
