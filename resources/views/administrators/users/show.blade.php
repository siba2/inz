@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_administrators.users.show.title_postfix'))

@section('content_header')
<h1>
    {{ __('t_administrators.users.show.content_header') }}
    <small>{{ __('t_administrators.users.show.content_header_small') }}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li><a href="/admin"><i class="fa fa-wrench "></i> {{ __('t_administrators.users.index.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_administrators.users.show.breadcrumb') }}</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                {{ __('t_administrators.users.show.content.label.box_header') }}
            </div>
            <!-- ./box-header -->
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <td><b>{{ __('t_common.#') }}</b></td>
                        <td>{{$model->id}}</td>
                    </tr>
                    <tr>
                        <td><b>{{ __('t_administrators.users.show.table.th.name') }}</b></td>
                        <td>{{$model->name}}</td>
                    </tr>   
                    <tr>
                        <td><b>{{ __('t_administrators.users.show.table.th.email') }}</b></td>
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

