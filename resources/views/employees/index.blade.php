@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_employees.employees.index.title_postfix'))

@section('content_header')
<h1>{{ __('t_employees.employees.content_header') }}</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_employees.employees.index.breadcrumb') }}</li>   
</ol>
@stop

@section('content')
@include('modals')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                {!! Html::decode(Html::linkRoute('employees.create', '<button type="button" class="btn btn-flat btn-primary">'.__("t_employees.employees.index.table.button.add").'</button>')) !!}
            </div>
            <div class="box-body">
                <table id="table" class="table table-bordered table-hover"></table>
            </div>
            <!-- ./box-body -->
        </div>
        <!-- ./box -->
    </div>
    <!-- ./col-xs-12 -->
</div>
<!-- ./row -->
@stop

@section('css')
<link rel="stylesheet" href="../../../node_modules/datatables.net-bs/css/dataTables.bootstrap.css">
@stop

@section('js')
<script src="./js/app.js"></script>
<script src="../../node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="../../node_modules/datatables.net-bs/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    $('#table').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Polish.json"
        },
        processing: true,
        serverSide: true,
        ajax: '/employees/get/all',
        columns: [
            {title: "{{ __('t_employees.employees.index.table.th.name') }}", data: 'name', name: 'name'},
            {title: "{{ __('t_employees.employees.index.table.th.position') }}", data: 'position', name: 'position'},
            {title: "{{ __('t_employees.employees.index.table.th.phone') }}", data: 'phone', name: 'phone'},
            {title: "", data: 'manage', name: 'manage', orderable: false, searchable: false}
        ]
    });
});
</script>
@stop