@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_admin.admin.edit.title_postfix'))

@section('content_header')
<h1>
    {{ __('t_admin.admin.edit.content_header') }}
    <small>{{ __('t_admin.admin.edit.content_header_small') }}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li><a href="/admin"><i class="fa fa-wrench"></i> {{ __('t_admin.admin.index.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_admin.admin.edit.breadcrumb') }}</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body">
                @include('admin/forms/edit')
            </div>
            <!-- ./box-body -->
        </div>
        <!-- ./box -->
    </div>
    <!-- ./col-xs-12 -->
</div>
<!-- ./row -->
@stop
