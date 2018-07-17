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
@include('modals')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <button type="button" id="new_schedule" class="btn btn-flat btn-primary">{{ __("t_schedule.schedule.index.table.button.add") }}</button>
            </div>
            <div class="box-body">
                <div id='calendar'></div>
            </div>
            <!-- ./box-body -->
        </div>
        <!-- ./box -->
    </div>
    <!-- ./col-xs-12 -->
</div>
<!-- ./row -->
@stop

@section('css')
<script src="../js/app.js"></script>
<link rel="stylesheet" href="../../../node_modules/fullcalendar/dist/fullcalendar.css">
@stop

@section('js')
<script src="../../node_modules/moment/moment.js"></script>
<script src="../../node_modules/fullcalendar/dist/fullcalendar.js"></script>

<script type="text/javascript">
$(document).ready(function () {

    $('#new_schedule').click(function () {
        alert('click');
    });

    $('#calendar').fullCalendar({
        contentHeight: 600,
        events: function (start, end, timezone, callback) {
            $.ajax({
                url: '/schedule/get/all',
                dataType: 'xml',
                data: {
                    start: start.unix(),
                    end: end.unix()
                },
                success: function (doc) {
                    var events = [];
                    $(doc).find('event').each(function () {
                        events.push({
                            title: $(this).attr('title'),
                            start: $(this).attr('start')
                        });
                    });
                    callback(events);
                }
            });
        }
    });

});
</script>
@stop