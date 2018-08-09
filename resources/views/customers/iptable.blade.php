@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_customers.customers.iptable.title_postfix'))

@section('content_header')
<h1>
    {{ __('t_customers.customers.iptable.content_header')}}
    <small>{{ __('t_customers.customers.iptable.content_header_small') }}</small>
</h1>
<meta name="csrf-token" content="{{ csrf_token() }}">
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li><a href="/customers"><i class="fa fa-users" ></i> {{ __('t_customers.customers.index.breadcrumb') }}</a></li>
    <li class="acvive">{{ __('t_customers.customers.iptable.breadcrumb') }}</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body">
                @include('customers/forms/iptable')
            </div>
            <!-- ./box-body -->
        </div>
        <!-- ./box -->
    </div>
    <!-- ./col-xs-12 -->
</div>
<!-- ./row -->
@stop