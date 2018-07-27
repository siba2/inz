@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_schedule.schedule.index.title_postfix'))

@section('content_header')
<h1>{{ __('t_schedule.schedule.content_header') }}</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_schedule.schedule.index.breadcrumb') }}</li>   
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary" onClick="modalSchedule()">{{ __('t_schedule.schedule.index.table.button.add') }}</button>
            </div>
            <div class="box-body">
                <div id='calendar' ></div>
            </div>
            <!-- ./box-body -->
        </div>
        <!-- ./box -->
    </div>
    <!-- ./col-xs-12 -->
</div>
<!-- ./row -->
@stop
@section('js')

<script type="text/javascript">
    $(document).ready(function () {
        $('#calendar').fullCalendar({
            height: 750,
            eventSources: [
                {
                    url: '/schedule/get/all',
                    type: 'GET',
                    color: 'yellow',
                    textColor: 'black'
                }

            ]
        });

        $("#start").datetimepicker({
            format: 'yyyy-mm-dd hh:ii:00',
            minuteStep: 1,
            pickerPosition: "bottom",
            autoclose: true
        });

        $("#end").datetimepicker({
            format: 'yyyy-mm-dd hh:ii:00',
            minuteStep: 1,
            pickerPosition: "bottom",
            autoclose: true
        });

        if ('{{$errors->has("start")}}' || '{{$errors->has("title")}}') {
            modalSchedule();
        }

    });
</script>
@stop