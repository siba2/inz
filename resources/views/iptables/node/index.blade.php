@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_iptables.iptables.node.title_postfix'))

@section('content_header')
<h1>{{ __('t_iptables.iptables.node.content_header') }}</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_iptables.iptables.node.breadcrumb') }}</li>   
</ol>
@stop

@section('content')
@include('modals')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                {!! Html::decode(Html::linkRoute('iptables.node.create', '<button type="button" class="btn btn-flat btn-primary">'.__("t_iptables.node.index.table.button.add").'</button>', [ $node_id ])) !!}
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
            ajax: '/iptables/node/get/all/{{ $node_id }}',
            columns: [
                {title: "{{ __('t_iptables.iptables.node.table.th.ipaddr') }}", data: 'ipaddr', name: 'ipaddr'},
                {title: "", data: 'manage', name: 'manage', orderable: false, searchable: false}
            ]
        });
    });
</script>


@stop