@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_employees.employees.show.title_postfix'))

@section('content_header')
<h1>
    {{ __('t_employees.employees.show.content_header') }}
    <small>{{ __('t_employees.employees.show.content_header_small') }}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li><a href="/employees"><i class="fa fa-male "></i> {{ __('t_employees.employees.index.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_employees.employees.show.breadcrumb') }}</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                {{ __('t_employees.employees.show.content.label.box_header') }}
            </div>
            <!-- ./box-header -->
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <td><b>{{ __('t_common.#') }}</b></td>
                        <td>{{$model->id}}</td>
                    </tr>
                    <tr>
                        <td><b>{{ __('t_employees.employees.show.table.th.name') }}</b></td>
                        <td>{{$model->name}}</td>
                    </tr>    
                     <tr>
                        <td><b>{{ __('t_employees.employees.show.table.th.position') }}</b></td>
                        <td>{{$model->position}}</td>
                    </tr>  
                     <tr>
                        <td><b>{{ __('t_employees.employees.show.table.th.phone') }}</b></td>
                        <td>{{$model->phone}}</td>
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


