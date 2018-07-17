@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_employees.employees.create.title_postfix'))

@section('content_header')
<h1>
    {{ __('t_employees.employees.create.content_header') }}
    <small>{{ __('t_employees.employees.create.content_header_small') }}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li><a href="/employees"><i class="fa fa-male"></i> {{ __('t_employees.employees.index.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_employees.employees.create.breadcrumb') }}</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body">
                @include('employees/forms/create')
            </div>
            <!-- ./box-body -->
        </div>
        <!-- ./box -->
    </div>
    <!-- ./col-xs-12 -->
</div>
<!-- ./row -->
@stop
