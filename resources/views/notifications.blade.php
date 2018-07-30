@if ($message = Session::get('success'))
<div class="box box-success box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">{{ __('t_messages.header.success') }}</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        {{ $message }}
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endif

@if ($message = Session::get('error'))
<div class="box box-danger box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">{{ __('t_messages.header.error') }}</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        {{ $message }}
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endif

@if ($message = Session::get('warning'))
<div class="box box-warning box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">{{ __('t_messages.header.warning') }}</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        {{ $message }}
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endif

