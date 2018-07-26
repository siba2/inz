@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_administrators.roles.index.title_postfix'))

@section('content_header')
<h1>
    {{ __('t_administrators.roles.index.content_header') }}  
</h1>
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_administrators.roles.index.breadcrumb') }}</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                {!! Html::decode(Html::linkRoute('administrators.roles.create', '<button type="button" class="btn btn-flat btn-primary">'.__("t_administrators.roles.index.table.button.add").'</button>')) !!}
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
            ajax: '/administrators/roles/get/all',
            columns: [
                {title: "{{ __('t_common.#') }}", data: 'id', name: 'id'},
                {title: "{{ __('t_administrators.roles.index.table.th.name') }}", data: 'name', name: 'name'},
                {title: "{{ __('t_administrators.roles.index.table.th.permissions') }}", data: 'permissions', name: 'permissions'},
                {title: "", data: 'manage', name: 'manage', orderable: false, searchable: false}


            ]
        });
    });
</script>
@stop
