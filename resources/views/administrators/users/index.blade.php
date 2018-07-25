@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_administrators.users.index.title_postfix'))

@section('content_header')
<h1>{{ __('t_administrators.users.content_header') }}</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_administrators.users.index.breadcrumb') }}</li>   
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                {!! Html::decode(Html::linkRoute('administrators.users.create', '<button type="button" class="btn btn-flat btn-primary">'.__("t_administrators.users.index.table.button.add").'</button>')) !!}
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

@section('js')
<script type="text/javascript">
$(document).ready(function () {
    $('#table').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Polish.json"
        },
        processing: true,
        serverSide: true,
        ajax: '/administrators/users/get/all',
        columns: [
            {title: "{{ __('t_administrators.users.index.table.th.name') }}", data: 'name', name: 'name'},
            {title: "{{ __('t_administrators.users.index.table.th.email') }}", data: 'email', name: 'email'},
            {title: "", data: 'manage', name: 'manage', orderable: false, searchable: false}
        ]
    });
});
</script>
@stop