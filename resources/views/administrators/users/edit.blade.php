@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_administrators.users.edit.title_postfix'))

@section('content_header')
<h1>
    {{ __('t_administrators.users.edit.content_header') }}
    <small>{{ __('t_administrators.users.edit.content_header_small') }}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li><a href="/administrators/users"><i class="fa fa-wrench"></i> {{ __('t_administrators.users.index.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_administrators.users.edit.breadcrumb') }}</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body">
                @include('administrators/users/forms/edit')
            </div>
            <!-- ./box-body -->
        </div>
        <!-- ./box -->
    </div>
    <!-- ./col-xs-12 -->
</div>
<!-- ./row -->
@stop
