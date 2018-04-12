
    {{ csrf_field() }}

    <div class="{{ $errors->has('bu_name') ? ' has-error' : '' }}">
         <label class="col-md-2">اسم العقار</label>
        <div class="col-md-10">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::text("bu_name",null,['class'=>'form-control']) !!}
            @if ($errors->has('bu_name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('bu_name') }}</strong>
                                    </span>
            @endif
        </div>
       
    </div>
    <div class="clearfix"></div>
    <br>
    {{----}}
    <div class="{{ $errors->has('bu_rent') ? ' has-error' : '' }}">
        <label class="col-md-2">نوع العقار</label>
        <div class="col-md-10">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::select("bu_type", ['0' => 'شقه', '1' => 'فيلا', '2' => 'شاليه'],null,['class'=>'form-control']) !!}
            @if ($errors->has('bu_type'))
                <span class="help-block">
                                        <strong>{{ $errors->first('bu_type') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="clearfix"></div>
    <br>
    {{----}}
     {{----}}
    <div class="{{ $errors->has('bu_square') ? ' has-error' : '' }}">
<label class="col-md-2">مساحه العقار</label>
        <div class="col-md-10">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::text("bu_square",null,['class'=>'form-control']) !!}
            @if ($errors->has('bu_square'))
                <span class="help-block">
                                        <strong>{{ $errors->first('bu_square') }}</strong>
                                    </span>
            @endif
        </div>
        
    </div>
    <div class="clearfix"></div>
    <br>
        <div class="{{ $errors->has('rooms') ? ' has-error' : '' }}">
        <label class="col-md-2">عدد الغرف</label>
        <div class="col-md-10">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::text("rooms",null,['class'=>'form-control']) !!}
            @if ($errors->has('rooms'))
                <span class="help-block">
                                        <strong>{{ $errors->first('rooms') }}</strong>
                                    </span>
            @endif
        </div>
        
    </div>
    <div class="clearfix"></div>
    <br>
     {{----}}
    <div class="{{ $errors->has('bu_rent') ? ' has-error' : '' }}">
    <label class="col-md-2">نوع العمليه</label>
        <div class="col-md-10">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::select("bu_rent", ['0' => 'ايجار', '1' => 'تمليك'],null,['class'=>'form-control']) !!}
            @if ($errors->has('bu_rent'))
                <span class="help-block">
                                        <strong>{{ $errors->first('bu_rent') }}</strong>
                                    </span>
            @endif
        </div>
        
    </div>
    <div class="clearfix"></div>
    <br>
    {{----}}
    <div class="{{ $errors->has('bu_price') ? ' has-error' : '' }}">
           <label class="col-md-2">سعر العقار</label>
       <div class="col-md-10">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::text("bu_price",null,['class'=>'form-control']) !!}
            @if ($errors->has('bu_price'))
                <span class="help-block">
                                        <strong>{{ $errors->first('bu_price') }}</strong>
                                    </span>
            @endif
        </div>
   
    </div>
    <div class="clearfix"></div>
    <br>
     {{----}}
    <div class="{{ $errors->has('bu_place') ? ' has-error' : '' }}">
        <label class="col-md-2">المنطقه</label>
        <div class="col-md-10">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::select("bu_place",bu_place(),null,['class'=>'form-control select2']) !!}
            @if ($errors->has('bu_place'))
                <span class="help-block">
                                        <strong>{{ $errors->first('bu_place') }}</strong>
                                    </span>
            @endif
        </div>
       
    </div>
    <div class="clearfix"></div>
    <br>
<!--  -->
  <!-- Image -->
    <div class="{{ $errors->has('image') ? ' has-error' : '' }}">
       <label class="col-md-2">صوره للعقار</label>
        <div class="col-md-10">
        @if(isset($bu))
           @if($bu->image != '')
           <img src="{{Request::root().'/website/bu_images/'.$bu->image}}" width="100">
           <div class="clearfix"></div>
           <br>
           @endif
        @endif
            {!! Form::file("image",null,['class'=>'form-control']) !!}
            @if ($errors->has('image'))
                <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="clearfix"></div>
        <br>
        <!-- end image -->

    {{----}}
    <div class="{{ $errors->has('bu_status') ? ' has-error' : '' }}">
       <label class="col-md-2">حاله العقار</label>
        <div class="col-md-10">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::select("bu_status", ['0' => 'غير مفعل', '1' => 'مفعل'],null,['class'=>'form-control']) !!}
            @if ($errors->has('bu_status'))
                <span class="help-block">
                                        <strong>{{ $errors->first('bu_status') }}</strong>
                                    </span>
            @endif
        </div>
        
    </div>
    <div class="clearfix"></div>
    <br>
    {{----}}
    <div class="{{ $errors->has('bu_meta') ? ' has-error' : '' }}">
        <label class="col-md-2">الكلمات الدلاليه</label>
        <div class="col-md-10">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::text("bu_meta",null,['class'=>'form-control']) !!}
            @if ($errors->has('bu_meta'))
                <span class="help-block">
                                        <strong>{{ $errors->first('bu_meta') }}</strong>
                                    </span>
            @endif
        </div>
        
    </div>
    <div class="clearfix"></div>
    <br>



    {{----}}
    {{----}}
    <div class="{{ $errors->has('bu_small_dis') ? ' has-error' : '' }}">
         <label class="col-md-2">وصف العقار لمحركات البحث</label>
        <div class="col-md-10">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::textarea("bu_small_dis",null,['class'=>'form-control','rows'=>'4']) !!}
            @if ($errors->has('bu_small_dis'))
                <span class="help-block">
                                        <strong>{{ $errors->first('bu_small_dis') }}</strong>
                                    </span>
            @endif
            <br>
            <div class="alert alert-warning">
                لا يمكن ادخال اكثر من 160 حرف علي حسب معاير جوجل
            </div>
        </div>
       
    </div>
    <div class="clearfix"></div>
    <br>
    {{----}}
    {{----}}
    <div class="{{ $errors->has('bu_langtuide') ? ' has-error' : '' }}">
       <label class="col-md-2">خط الطول</label>
        <div class="col-md-10">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::text("bu_langtuide",null,['class'=>'form-control']) !!}
            @if ($errors->has('bu_langtuide'))
                <span class="help-block">
                                        <strong>{{ $errors->first('bu_langtuide') }}</strong>
                                    </span>
            @endif
        </div>
        
    </div>
    <div class="clearfix"></div>
    <br>
    {{----}}
    <div class="{{ $errors->has('bu_latitde') ? ' has-error' : '' }}">
           <label class="col-md-2">دائره العرض</label>
        <div class="col-md-10">
            {{--<input id="name" type="text" class="form-control" name="name" placeholder="اسم المستخدم" value="{{ old('name') }}" required autofocus>--}}
            {!! Form::text("bu_latitde",null,['class'=>'form-control']) !!}
            @if ($errors->has('bu_latitde'))
                <span class="help-block">
                                        <strong>{{ $errors->first('bu_latitde') }}</strong>
                                    </span>
            @endif
        </div>
     
    </div>
    <div class="clearfix"></div>
    <br>
    {{----}}
    <div class="{{ $errors->has('bu_large_dis') ? ' has-error' : '' }}">
        <label class="col-md-2">الوصف المطول للعقار</label>
        <div class="col-md-10">
            {!! Form::textarea("bu_large_dis",null,['class'=>'form-control','rows'=>'6']) !!}
            @if ($errors->has('bu_large_dis'))
                <span class="help-block">
                                        <strong>{{ $errors->first('bu_large_dis') }}</strong>
                                    </span>
            @endif
        </div>
        
    </div>
    <div class="clearfix"></div>
    <br>


    <div class="text2">
        <div class="col-md-12">
            <button type="submit" class="btn btn-warning">
                <i class="fa fa-btn fa-sign-in" style="color: #ffffff;"></i>
                تنفيذ
            </button>
        </div>
    </div>
