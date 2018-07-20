<form method="post"  action="/iptables/store" >
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('t_iptables.iptables.form.header.central') }}</h3>
            </div>
            <!-- /.box-header -->
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group {{ ($errors->has('class') ? 'has-error' : '') }}">
                    <label for="class">{{ __('t_iptables.iptables.form.label.name') }}*</label>
                    <input type="text" id="class" name="class" class="form-control" required value="{{ old('class', (isset($model->class) ? $model->class : '')) }}">
                    @if ($errors->has('class')) <span class="help-block">{{ $errors->first('class') }}</span> @endif
                </div>         
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ __('t_common.submit') }}</button>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>
</form>
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#class').inputmask("9{1,3}.9{1,3}.9{1,3}.0");
    }); 
</script>
@stop
