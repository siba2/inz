@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_customers.customers.cash.title_postfix'))

@section('content_header')
<h1>{{ __('t_customers.customers.cash.content_header') }}</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_customers.customers.cash.breadcrumb') }}</li>   
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                {!! Html::decode(Html::linkRoute('customers.cash.create', '<button type="button" class="btn btn-flat btn-primary">'.__("t_customers.customers.cash.table.button.add").'</button>', [ $model->id ])) !!}
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
            ajax: '/customers/cash/get/all/{{$model->id}}',
            columns: [
                {title: "{{ __('t_customers.customers.cash.table.th.date') }}", data: 'date', name: 'date'},
                {title: "{{ __('t_customers.customers.cash.table.th.id_tariff') }}", data: 'id_tariff', name: 'id_tariff'},
                {title: "{{ __('t_customers.customers.cash.table.th.value') }}", data: 'value', name: 'value'},
                {title: "{{ __('t_customers.customers.cash.table.th.balance') }}", data: 'balance', name: 'balance'}
            ],
            order: [0, 'asc'],
            pageLength: 'All',
            paging: false


        });

    });
</script>
@stop