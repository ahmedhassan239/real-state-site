
@extends('admin.layouts.layout')

@section('title')
    التحكم في الاعضاء

@endsection

@section('header')

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.0/jquery-confirm.min.css">

@endsection



@section('content')

    <section class="content-header">
        <h1>
            التحكم في الاعضاء

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{url('/adminpanel/users')}}">التحكم في الاعضاء</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">التحكم في الاعضاء</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="users" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class='no-sort'>رقم العضو</th>
                                <th class='no-sort'>اسم العضو</th>
                                <th class='no-sort'>الايميل</th>
                                <th class='no-sort'>تاريخ التسجيل</th>
                                <th class='no-sort'>الصلاحيات</th>
                                <th class='no-sort'>التحكم</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>رقم العضو</th>
                                <th>اسم العضو</th>
                                <th>الايميل</th>
                                <th>تاريخ التسجيل</th>
                                <th>الصلاحيات</th>
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
    $('#users').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "/adminpanel/users/data",
            type: 'POST'
        },
        "ordering": false,
    });
});
</script>

@endsection