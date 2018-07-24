@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_customers.customers.cash.create.title_postfix'))

@section('content_header')
<h1>
    {{ __('t_customers.customers.cash.create.content_header') }}
    <small>{{ __('t_customers.customers.cash.content_header_small') }}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li><a href="/iptables"><i class="fa fa-users"></i> {{ __('t_customers.customers.index.breadcrumb') }}</a></li>
    <li><a href="/iptables/cash/{{$model->id}}"><i class="fa fa-users"></i> {{ __('t_customers.customers.cash.create.content_header') }}</a></li>
    <li class="active">{{ __('t_customers.customers.cash.create.breadcrumb') }}</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body">
                @include('customers/cash/forms/create')
            </div>
            <!-- ./box-body -->
        </div>
        <!-- ./box -->
    </div>
    <!-- ./col-xs-12 -->
</div>
<!-- ./row -->
@stop
