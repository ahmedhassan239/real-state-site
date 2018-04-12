@extends('layouts.app')
@section('title')
    تسجيل عضويه جديده
@endsection
@section('content')
    <div class="container">
        <hr>
        <div class="contact-bottom">
            <h3>
                تسجيل عضويه جديده
            </h3>
            <hr>
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="text2{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>

                <div class="text2{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" placeholder="البريد الاليكتروني" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" placeholder="كلمه المرور" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <br>
                <div class="text2">
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="كرر كلمه المرور" required>
                    </div>
                </div>
                <br>
                <div class="text2">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-btn fa-sign-in" style="color: #ffffff;"></i>
                            تسجيل عضويه جديده
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix">

        </div>
        <br>
    </div>
@endsection
