@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_smsapi.smsapi.create.title_postfix'))

@section('content_header')
<h1>
    {{ __('t_smsapi.smsapi.create.content_header') }}
    <small>{{ __('t_smsapi.smsapi.create.content_header_small') }}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li><a href="/smsapi"><i class="fa fa-envelope"></i> {{ __('t_smsapi.smsapi.index.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_smsapi.smsapi.create.breadcrumb') }}</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body">
                @include('sms/smsapi/forms/create')
            </div>
            <!-- ./box-body -->
        </div>
        <!-- ./box -->
    </div>
    <!-- ./col-xs-12 -->
</div>
<!-- ./row -->
@stop
