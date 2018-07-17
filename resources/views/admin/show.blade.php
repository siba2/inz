@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_admin.admin.show.title_postfix'))

@section('content_header')
<h1>
    {{ __('t_admin.admin.show.content_header') }}
    <small>{{ __('t_admin.admin.show.content_header_small') }}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li><a href="/admin"><i class="fa fa-wrench "></i> {{ __('t_admin.admin.index.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_admin.admin.show.breadcrumb') }}</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                {{ __('t_admin.admin.show.content.label.box_header') }}
            </div>
            <!-- ./box-header -->
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <td><b>{{ __('t_common.#') }}</b></td>
                        <td>{{$model->id}}</td>
                    </tr>
                    <tr>
                        <td><b>{{ __('t_admin.admin.show.table.th.name') }}</b></td>
                        <td>{{$model->name}}</td>
                    </tr>   
                    <tr>
                        <td><b>{{ __('t_admin.admin.show.table.th.email') }}</b></td>
                        <td>{{$model->email}}</td>
                    </tr> 
                </table>
            </div>
            <!-- ./box-body -->
        </div>
        <!-- ./box -->
    </div>
    <!-- ./col-xs-12 -->
</div>
<!-- ./row -->
@stop


