
    {{ csrf_field() }}

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="col-md-12">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::text("name",null,['class'=>'form-control','placeholder'=>'اسم المستخدم']) !!}
            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="col-md-12">
            {{--<input id="email" type="email" class="form-control" name="email" placeholder="البريد الاليكتروني" value="{{ old('email') }}" required>--}}
            {!! Form::text("email",null,['class'=>'form-control','placeholder'=>'البريد الاليكتروني']) !!}
            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="clearfix"></div>
    <br>
    <div class="{{ $errors->has('admin') ? ' has-error' : '' }}">
        <div class="col-md-12">
            {{--<select name="admin" id="admin" class="form-control">--}}
                {{--<option value="0">عضو</option>--}}
                {{--<option value="1">مدير</option>--}}
            {{--</select>--}}
            {!! Form::select("admin",['0'=>'user','1'=>'admin'],null,['class'=>'form-control']) !!}
            @if ($errors->has('admin'))
                <span class="help-block">
                                            <strong>{{ $errors->first('admin') }}</strong>
                                        </span>
            @endif
         </div>
    </div>
    <div class="clearfix"></div>
    <br>
    @if(!isset($user))
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
    <div >
        <div class="col-md-12">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="كرر كلمه المرور" required>
        </div>
    </div>

    <div class="clearfix"></div>
    <br>
    @endif
    <div class="text2">
        <div class="col-md-12">
            <button type="submit" class="btn btn-warning">
                <i class="fa fa-btn fa-sign-in" style="color: #ffffff;"></i>
                تنفيذ
            </button>
        </div>
    </div>
