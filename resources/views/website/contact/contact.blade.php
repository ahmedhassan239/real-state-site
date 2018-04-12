@extends('layouts.app')
@section('title')
    اتصل بنا
@endsection
@section('header')
    <link rel="stylesheet" href="{{asset('cus/buall.css')}}">
@endsection
@section('content')
    <br>
    <br>

    <div class="container">
        <h1>اتصل بنا</h1>
        <div class="row">
            <div class="col-md-8">
                <div class="well well-sm">
                    <form action="/contact/store" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="{{ $errors->has('contact_message') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        <label for="name">الرساله</label>
                                        <textarea name="contact_message" id="message" class="form-control" rows="9" cols="25"
                                                  placeholder="الرساله"></textarea>
                                        @if ($errors->has('contact_message'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('contact_message') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="{{ $errors->has('contact_name') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        <label for="name"> الاسم</label>
                                        <input type="text" name ="contact_name" class="form-control" id="name" placeholder="من فضلك ادخل الاسم"  />
                                        @if ($errors->has('contact_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('contact_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="{{ $errors->has('contact_email') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        <label for="email"> البريد الالكتروني </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">  <i class="fa fa-mail-reply-all" aria-hidden="true"></i></span>
                                            <input type="email" name="contact_email" value="{{\Illuminate\Support\Facades\Auth::user()?\Illuminate\Support\Facades\Auth::user()->email:''}}" class="form-control" id="email" placeholder="البريد الالكتروني"/></div>
                                        @if ($errors->has('contact_email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('contact_email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="{{ $errors->has('contact_type') ? ' has-error' : '' }}">
                                    <div class="form-group">
                                        <label for="subject"> العنوان </label>
                                        <select id="subject" name="contact_type" class="form-control">
                                            @foreach(contact() as $key=> $con)
                                                <option  value="{{$key}}">{{$con}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('contact_type'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('contact_type') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="banner_btn pull-right" id="btnContactUs" style="background: #2f2530;">ارسال الرساله</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <form>
                    <legend><i class="fa fa-desktop"></i> مكتبنا</legend>
                    <address>
                        <strong>العنوان:</strong><br>
                        {{nl2br(getsetting('address'))}}<br>
                        <br>
                        <strong>رقم التليفون:</strong><br>
                        <abbr title="Phone">{{getsetting('mobile')}} </abbr>
                    </address>
                    <address>
                        <strong>{{getsetting()}}</strong>
                        <br><br>
                        <strong>البريد الالكتروني:</strong><br>
                        <a href="mailto:#">{{getsetting('email')}}</a>
                    </address>
                </form>
            </div>
        </div>
    </div>
@endsection
