<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('t_iptables.iptables.node.form.header.central') }}</h3>
        </div>
        <!-- /.box-header -->
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group {{ ($errors->has('ipaddr') ? 'has-error' : '') }}">
                <label for="ipaddr">{{ __('t_iptables.iptables.node.form.label.ipaddr') }}*</label>
                <input type="text" id="ipaddr" name="ipaddr" class="form-control" required value="{{ old('ipaddr', (isset($model->ipaddr) ? $model->ipaddr : '')) }}">
                @if ($errors->has('ipaddr')) <span class="help-block">{{ $errors->first('ipaddr') }}</span> @endif
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

@section('js')
<script type="text/javascript">
    $(document).ready(function () {      
       $('#ipaddr').inputmask('{{$ipaddr}}9{1,3}');      
    });
</script>
@stop