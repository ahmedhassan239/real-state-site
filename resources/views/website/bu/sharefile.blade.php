@if(count($bu) > 0)
    {{--@foreach(array_chunk($bu ,3) as $buu)--}}
        {{--<div class="row">--}}
            @foreach($bu as $key=>$b)
                @if($key % 3 ==0 && $key != 0)
                    <div class="clearfix"></div>
                @endif

            <div class="col-md-4 pull-right">
                <div class="productbox">
                    <img src="{{checkImageExist($b->image,'/website/thumb/','/website/thumb/')}}" class="img-responsive">
                    <div class="producttitle">{{$b->bu_name}}

                    </div>
                    <hr>

                    {{--<p class="text-justify">{{str_limit( $b->bu_small_dis,50) }}</p>--}}
                    <span class="pull-left">المنطقه:{{bu_place()[$b->bu_place]}}</span>
                    <span class="pull-right">  المساحه: {{$b->bu_square}} متر</span>
                    <div class="productprice">
                        <span class="pull-right">  نوع العقار: {{bu_type()[$b->bu_type]}}</span>
                        <br>
                        <span class="pull-right">  نوع العمليه: {{bu_rent()[$b->bu_rent]}}</span>
                        {{--<span class="pull-left">  عدد الغرف: {{$b->rooms}}</span>--}}
                        <hr>
                        <div class="pull-left">
                            <a href="{{url('/single_building/'.$b->id) }}" class="btn btn-primary btm-sm" role="button">
                                اظهر التفاصيل <span class="fa fa-arrow-circle-o-left" style="color: #FFF;"></span>
                            </a>
                        </div>
                        <div class="pricetext">{{$b->bu_price}} جنيه</div>
                    </div>
                </div>
            </div>

            @endforeach
        {{--</div>--}}
    {{--@endforeach--}}
        <div class="clearfix"></div>

        <br>
        @else
            <div class="alert alert-danger">
               لا يوجد عقارات حاليا
            </div>
@endif