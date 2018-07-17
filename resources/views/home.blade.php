@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_home.title_postfix'))

@section('content_header')
<h1>{{ __('t_home.content_header') }}</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>   
</ol>
@stop

@section('content')

<p>Witamy w systemie.</p>
@stop

@section('css')
<!--<link rel="stylesheet" href="/css/admin_custom.css">-->
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop