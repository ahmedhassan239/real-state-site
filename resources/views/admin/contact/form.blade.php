
    {{ csrf_field() }}

    <div class="{{ $errors->has('contact_name') ? ' has-error' : '' }}">
        <div class="col-md-2">اسم المرسل</div>
        <div class="col-md-10">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::text("contact_name",null,['class'=>'form-control','placeholder'=>'اسم المستخدم']) !!}
            @if ($errors->has('contact_name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('contact_name') }}</strong>
                                    </span>
            @endif
        </div>

    </div>
    <div class="clearfix"></div>
    <br>

    <div class="{{ $errors->has('contact_email') ? ' has-error' : '' }}">
        <div class="col-md-2">البريد الاكتروني</div>
        <div class="col-md-10">
            {!! Form::text("contact_email",null,['class'=>'form-control','placeholder'=>'البريد الاليكتروني']) !!}
            @if ($errors->has('contact_email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('contact_email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="clearfix"></div>
    <br>
    <div class="{{ $errors->has('contact_message') ? ' has-error' : '' }}">
        <div class="col-md-2"> الرساله</div>
        <div class="col-md-10">
            {!! Form::textarea("contact_message",null,['class'=>'form-control']) !!}
            @if ($errors->has('contact_message'))
                <span class="help-block">
                                            <strong>{{ $errors->first('contact_message') }}</strong>
                                        </span>
            @endif
        </div>

    </div>
    <div class="clearfix"></div>
    <br>
    <div class="{{ $errors->has('contact_type') ? ' has-error' : '' }}">
        <div class="col-md-2">نوع الرساله</div>
        <div class="col-md-10">
            {!! Form::select("contact_type",contact(),null,['class'=>'form-control']) !!}
            @if ($errors->has('contact_type'))
                <span class="help-block">
                                        <strong>{{ $errors->first('contact_type') }}</strong>
                                    </span>
            @endif
        </div>

    </div>
    <div class="clearfix"></div>
    <br>


    <div class="text2">
        <div class="col-md-12">

        </div>
    </div>
