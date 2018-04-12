
@extends('admin.layouts.layout')

@section('title')
    التحكم في العقارات

@endsection

@section('header')

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.0/jquery-confirm.min.css">

@endsection



@section('content')

    <section class="content-header">
        <h1>
            التحكم في العقارات

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{url('/adminpanel/bu')}}">    التحكم في العقارات</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">    التحكم في العقارات</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="bus" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class='no-sort'>رقم العقار</th>
                                <th class='no-sort'>اسم العقار</th>
                                <th class='no-sort'>نوع العقار</th>
                                <th class='no-sort'>مساحه العقار</th>
                                <th class='no-sort'> عدد الغرف </th>
                                <th class='no-sort'>نوع العمليه</th>
                                <th class='no-sort'> سعر العقار </th>
                                <th class='no-sort'>حاله العقار</th>
                                {{--<th class='no-sort'>الكلمات الدلاليه</th>--}}
                                {{--<th class='no-sort'>وصف العقار لمحركات البحث</th>--}}
                                <th class='no-sort'>خط الطول</th>
                                <th class='no-sort'>دائره العرض</th>
                                <th class='no-sort'>المنطقه</th>
                                {{--<th class='no-sort'>الوصف المطول للعقار</th>--}}
                                <th class='no-sort'>تاريخ التسجيل</th>
                                <th class='no-sort'>التحكم</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>رقم العقار</th>
                                <th>اسم العقار</th>
                                <th>نوع العقار</th>
                                <th>مساحه العقار</th>
                                <th> عدد الغرف </th>
                                <th>نوع العمليه</th>
                                <th> سعر العقار </th>
                                <th>حاله العقار</th>
                                {{--<th>الكلمات الدلاليه</th>--}}
                                {{--<th>وصف العقار لمحركات البحث</th>--}}
                                <th>خط الطول</th>
                                <th>دائره العرض</th>
                                <th class='no-sort'>المنطقه</th>
                                {{--<th>الوصف المطول للعقار</th>--}}
                                <th>تاريخ التسجيل</th>
                                <th>التحكم</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection



@section('footer')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#bus').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "ajax": {
             'url':"/adminpanel/bu/data",
             'type': 'POST',
         },
        "ordering": false
    });
});
</script>

@endsection