<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('t_iptables.node.form.header.central') }}</h3>
        </div>
        <!-- /.box-header -->
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group {{ ($errors->has('	ipaddr') ? 'has-error' : '') }}">
                <label for="ipaddr">{{ __('t_iptables.node.form.label.ipaddr') }}*</label>
                <input type="text" id="ipaddr" name="ipaddr" class="form-control" required value="{{ old('ipaddr', (isset($model->ipaddr) ? $model->ipaddr : '')) }}">
                @if ($errors->has('ipaddr')) <span class="help-block">{{ $errors->first('ipaddr') }}</span> @endif
            </div>     
            <div class="form-group {{ ($errors->has('mac') ? 'has-error' : '') }}">
                <label for="mac">{{ __('t_iptables.node.form.label.mac') }}*</label>
                <input type="text" id="mac" name="mac" class="form-control" required value="{{ old('mac', (isset($model->mac) ? $model->mac : '')) }}">
                @if ($errors->has('mac')) <span class="help-block">{{ $errors->first('mac') }}</span> @endif
            </div>  
            <div class="form-group {{ ($errors->has('comment') ? 'has-error' : '') }}">
                <label for="comment">{{ __('t_iptables.node.form.label.comment') }}</label>
                <input type="text" id="comment" name="comment" class="form-control"  value="{{ old('comment', (isset($model->comment) ? $model->comment : '')) }}">
                @if ($errors->has('comment')) <span class="help-block">{{ $errors->first('comment') }}</span> @endif
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
