@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_serwersms.serwersms.info.title_postfix'))

@section('content_header')
<h1>{{ __('t_serwersms.serwersms.content_header') }}</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_serwersms.serwersms.index.breadcrumb') }}</li>   
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ __('t_serwersms.serwersms.show.') }}</span>
                                <span class="info-box-number">1,410</span>
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
                                <span class="info-box-text">{{ __('t_serwersms.serwersms.show.') }}</span>
                                <span class="info-box-number">410</span>
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
                                <span class="info-box-text">{{ __('t_serwersms.serwersms.show.') }}</span>
                                <span class="info-box-number">13,648</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">

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

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Area Chart</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="chart">
            <canvas id="myChart" style="height: 150px; width: 474px;" width="474" height="150"></canvas>
        </div>
    </div>
    <!-- /.box-body -->
</div>

@stop
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        var ctx = $('#myChart');

        var myChart = new Chart(ctx, {
            type: 'line',
            data: [12, 19, 3, 5, 2, 3]

        });
    });
</script>
@stop