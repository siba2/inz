@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_customers.customers.show.title_postfix'))

@section('content_header')
<h1>
    {{ __('t_customers.customers.show.content_header') }}
    <small>{{ __('t_customers.customers.show.content_header_small') }}</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li><a href="/customers"><i class="fa fa-users "></i> {{ __('t_customers.customers.index.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_customers.customers.show.breadcrumb') }}</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                {{ __('t_customers.customers.show.content.label.box_header') }}
            </div>
            <!-- ./box-header -->
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <td><b>{{ __('t_common.#') }}</b></td>
                        <td>{{$model->id}}</td>
                    </tr>
                    <tr>
                        <td><b>{{ __('t_customers.customers.show.table.th.name') }}</b></td>
                        <td>{{$model->name}}</td>
                    </tr>      
                    <tr>
                        <td><b>{{ __('t_customers.customers.show.table.th.lastname') }}</b></td>
                        <td>{{$model->lastname}}</td>
                    </tr> 
                    <tr>
                        <td><b>{{ __('t_customers.customers.show.table.th.email') }}</b></td>
                        <td>{{$model->email}}</td>
                    </tr> 
                    <tr>
                        <td><b>{{ __('t_customers.customers.show.table.th.zip') }}</b></td>
                        <td>{{$model->zip}}</td>
                    </tr> 
                    <tr>
                        <td><b>{{ __('t_customers.customers.show.table.th.city') }}</b></td>
                        <td>{{$model->city}}</td>
                    </tr> 
                    <tr>
                        <td><b>{{ __('t_customers.customers.show.table.th.phone') }}</b></td>
                        <td>{{$model->phone}}</td>
                    </tr> 
                    <tr>
                        <td><b>{{ __('t_customers.customers.show.table.th.address') }}</b></td>
                        <td>{{$model->address}}</td>
                    </tr> 
                    <tr>
                        <td><b>{{ __('t_customers.customers.show.table.th.info') }}</b></td>
                        <td>{{$model->info}}</td>
                    </tr> 
                </table>
                <br/>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('t_customers.customers.show.ip') }}</span>
                                <span class="info-box-number">{{$ip}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('t_customers.customers.show.mac') }}</span>
                                <span class="info-box-number">{{$mac}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('t_customers.customers.show.comment') }}</span>
                                <span class="info-box-number">{{$comment}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('t_customers.customers.show.tariff') }}</span>
                                <span class="info-box-number">
                                    @foreach($arrTariff as $tariff)
                                    {{$tariff->name}}<br />
                                    @endforeach
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- ./box-body -->
        </div>
        <!-- ./box -->
    </div>
    <!-- ./col-xs-12 -->
</div>
<!-- ./row -->
@stop


