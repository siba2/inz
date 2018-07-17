@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_customers.tariffs.title_postfix'))

@section('content_header')
<h1>
    {{ __('t_customers.tariffs.content_header')}}
    <small>{{ __('t_customers.tariffs.content_header_small') }}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li><a href="/customers"><i class="fa fa-users" ></i> {{ __('t_customers.customers.index.breadcrumb') }}</a></li>
    <li class="acvive">{{ __('t_customers.tariffs.breadcrumb') }}</li>
</ol>
@stop

@section('content')

@include('modals')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body">
                @include('customers/forms/tariffs')
            </div>
            <!-- ./box-body -->
        </div>
        <!-- ./box -->
    </div>
    <!-- ./col-xs-12 -->
</div>
<!-- ./row -->
@stop