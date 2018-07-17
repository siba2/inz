@extends('adminlte::page')

@section('title_postfix', ' | '.trans('t_iptables.iptables.index.title_postfix'))

@section('content_header')
<h1>{{ __('t_iptables.iptables.index.content_header') }}</h1>
<ol class="breadcrumb">
    <li><a href="/home"><i class="fa fa-dashboard"></i> {{ __('t_common.breadcrumb') }}</a></li>
    <li class="active">{{ __('t_iptables.iptables.index.breadcrumb') }}</li>   
</ol>
@stop

@section('content')

@include('modals')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                {!! Html::decode(Html::linkRoute('iptables.class.create', '<button type="button" class="btn btn-flat btn-primary">'.__("t_iptables.iptables.index.table.button.add").'</button>')) !!}
            </div>         
            @foreach($classes as $class)
            <div class="col-md-2"> </br>
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">192.168.{{$class->class}}.*</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" href="/iptables/class/delete/{{$class->id}}" onClick="modalConfirm($(this).attr('href'))"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div id="box_{{$class->class}}" class="box-body" style="">
                        @for ($i = 0; $i < 255; $i++)
                        @if($i != 2)
                        <center>192.168.{{$class->class}}.{{$i}}</center></br>
                        @endif
                        @endfor
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            @endforeach    
            <!-- ./box-body -->
        </div>
        <!-- ./box -->
    </div>
    <!-- ./col-xs-12 -->
</div>
<!-- ./row -->
@stop

@section('js')
<script src="./js/app.js"></script>


@stop