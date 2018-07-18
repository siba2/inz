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
@stop

@section('js')
<script src="./js/app.js"></script>
<script type="text/javascript">
$(document).ready(function () {

});
</script>
@stop