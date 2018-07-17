@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_sms.smsapi.index.title_postfix'))

@section('content_header')
<h1>{{ __('t_sms.smsapi.content_header') }}</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_sms.smsapi.index.breadcrumb') }}</li>   
</ol>
@stop

@section('content')
@include('modals')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
               
            </div>
            <div class="box-body">
              
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

@stop

@section('js')

<script type="text/javascript">
$(document).ready(function () {

 

});
</script>
@stop