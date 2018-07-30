@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_serwersms.serwersms.info.title_postfix'))

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                                <span class="info-box-text">{{ __('t_serwersms.serwersms.show.countSMS') }}</span>
                                <span class="info-box-number">{{$count}}</span>
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
                                <span class="info-box-text">{{ __('t_serwersms.serwersms.show.pkt') }}</span>
                                <span class="info-box-number">{{$limit}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">

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
        <select id="years" name="years" class="btn btn-flat btn-primary" >
            @foreach($years as $year)
            <option value="{{$year->year}}" >{{$year->year}}</option>
            @endforeach           
        </select>
        <center><h3 class="box-title">{{ __('t_serwersms.serwersms.show.') }}</h3></center>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="chart">
            <canvas id="myChart" width="400" height="100"></canvas>
        </div>
    </div>
    <!-- /.box-body -->
</div>
@stop
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        var ctx = $('#myChart');
        var dataChart;
        var months;
        function rawChart() {
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                            label: '',
                            data: dataChart,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#years').change(function () {
            $.ajax({
                type: "post",
                url: '/serwersms/info/data',
                data: {
                    year: $('#years').val()
                },
                success: function (data) {

                    dataChart = data[0];
                    months = data[1];
                }
            }).done(function (data) {
                rawChart();
            });
        });

        $('#years').change();
    });
</script>
@stop
