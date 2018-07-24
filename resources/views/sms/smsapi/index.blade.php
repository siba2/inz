@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_smsapi.smsapi.index.title_postfix'))

@section('content_header')
<h1>{{ __('t_smsapi.smsapi.content_header') }}</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_smsapi.smsapi.index.breadcrumb') }}</li>   
</ol>
@stop

@section('content')
@include('modals')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                {!! Html::decode(Html::linkRoute('smsapi.create', '<button type="button" class="btn btn-flat btn-primary">'.__("t_smsapi.smsapi.index.table.button.add").'</button>')) !!}
                {!! Html::decode(Html::linkRoute('smsapi.info', '<button type="button" class="btn btn-flat btn-primary">'.__("t_smsapi.smsapi.index.table.button.info").'</button>')) !!}
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
<script src="../js/app.js"></script>

@stop

@section('js')

<script type="text/javascript">
$(document).ready(function () {
    $('#table').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Polish.json"
        },
        processing: true,
        serverSide: true,
        ajax: '/smsapi/get/all',
        columns: [
            {title: "{{ __('t_smsapi.smsapi.index.table.th.phone') }}", data: 'phone', name: 'phone'},
            {title: "{{ __('t_smsapi.smsapi.index.table.th.text') }}", data: 'text', name: 'text'},
            {title: "{{ __('t_smsapi.smsapi.index.table.th.status') }}", data: 'status', name: 'status'},
            {title: "", data: 'manage', name: 'manage', orderable: false, searchable: false}
        ]
    });
});
</script>
@stop