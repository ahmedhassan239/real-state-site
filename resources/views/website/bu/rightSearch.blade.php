<div class="col-md-3">
    <div class="profile-sidebar">
        <h2 style="margin-right: 20px;">البحث المتقدم</h2>
        <div class="profile-usermenu" style="padding: 10px;">
            {!! Form::open(['url'=>'search','method'=>'get']) !!}
            <ul class="nav" style="padding-right: 0px;">
                <li >
                    <div class="{{ $errors->has('bu_price') ? ' has-error' : '' }}">
                    {!! Form::text("bu_price_from",null,['class'=>'form-control','placeholder'=>'سعر العقار من']) !!}
                        @if ($errors->has('bu_price'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('bu_price') }}</strong>
                                    </span>
                        @endif
                    </div>
                </li>
                <br>
                <li >
                    <div class="{{ $errors->has('bu_price') ? ' has-error' : '' }}">
                        {!! Form::text("bu_price_to",null,['class'=>'form-control','placeholder'=>'سعر العقار الي ']) !!}
                        @if ($errors->has('bu_price'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('bu_price') }}</strong>
                                    </span>
                        @endif
                    </div>
                </li>
                <br>
                <li >
                    {!! Form::select("rooms",room_num(),null,['class'=>'form-control','placeholder'=>'عدد الغرف']) !!}
                </li>
                <br>
                <li >
                    {!! Form::select("bu_type",bu_type(),null,['class'=>'form-control','placeholder'=>'نوع العقار']) !!}
                </li>
                <br>
                <li >
                    {!! Form::select("bu_place",bu_place(),null,['class'=>'form-control','placeholder'=>'منطقه العقار']) !!}
                </li>
                <br>
                <li >
                    {!! Form::select("bu_rent",bu_rent(),null,['class'=>'form-control','placeholder'=>'نوع العمليه']) !!}
                </li>
                <br>
                <li >
                    <div class="{{ $errors->has('bu_square') ? ' has-error' : '' }}">
                        {!! Form::text("bu_square",null,['class'=>'form-control','placeholder'=>'مساحه العقار']) !!}
                        @if ($errors->has('bu_square'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('bu_square') }}</strong>
                                    </span>
                        @endif
                    </div>
                </li>
                <br>
                <li >
                    {!! Form::submit("ابحث",['class'=>'banner_btn']) !!}
                </li>
            </ul>
            {!! Form::close() !!}
        </div>
        <!-- END MENU -->
    </div>
    <br>
    <div class="profile-sidebar">
        <h2 style="margin-right: 20px;">خيارات العقارات</h2>
        <div class="profile-usermenu">
            <ul class="nav" style="padding-right: 0px;">
                <li >
                    <a href="{{url('/show_all_buildings')}}"><i class="glyphicon glyphicon-home"></i> كل العقارات </a>
                </li>
                <li>
                    <a href="{{url('/for_rent')}}"><i class="glyphicon glyphicon-user"></i>ايجار</a>
                </li>
                <li>
                    <a href="{{url('/for_buy')}}" ><i class="glyphicon glyphicon-ok"></i>تمليك</a>
                </li>
                <li>
                    <a href="{{url('/type/0')}}" ><i class="glyphicon glyphicon-ok"></i>شقق</a>
                </li>
                <li>
                    <a href="{{url('/type/1')}}" ><i class="glyphicon glyphicon-ok"></i>فيلات</a>
                </li>
                <li>
                    <a href="{{url('/type/2')}}" ><i class="glyphicon glyphicon-ok"></i>شاليهات</a>
                </li>

            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>