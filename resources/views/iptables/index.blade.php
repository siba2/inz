@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_iptables.iptables.index.title_postfix'))

@section('content_header')
<h1>{{ __('t_iptables.iptables.index.content_header') }}</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_iptables.iptables.index.breadcrumb') }}</li>   
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                {!! Html::decode(Html::linkRoute('iptables.create', '<button type="button" class="btn btn-flat btn-primary">'.__("t_iptables.iptables.index.table.button.add").'</button>')) !!}
            </div>         
            <div class="box-body">
                <table id="table" class="table table-bordered table-hover"></table>
            </div>
        </div>
    </div>
</div>
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
            ajax: '/iptables/get/all',
            columns: [
                {title: "{{ __('t_iptables.iptables.index.table.th.class') }}", data: 'class', name: 'class'},
                {title: "", data: 'manage', name: 'manage', orderable: false, searchable: false}
            ]
        });
    });
</script>


@stop