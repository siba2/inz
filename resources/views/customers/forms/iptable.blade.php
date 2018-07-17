<form method="post"  action="/customers/iptable/store">
    <input type="hidden" id="id" name="id" value="{{ $model->id or old('id') }}">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('t_customers.iptable.config.header.central') }}</h3>
            </div>
            <!-- /.box-header -->
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="">{{ __('t_customers.customers.form.label.') }}</label>
                    <select type="text" id="" name="" class="form-control">
                        @foreach($classes as $class)
                        <option value="{{$class->id}}" >{{$class->class}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">{{ __('t_customers.customers.form.label.') }}</label>
                    <select type="text" id="" name="" class="form-control">
                        @for ($i = 0; $i < 255; $i++)
                        <option value="{{$class->id}}" >192.168.{{$class->class}}.{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group {{ ($errors->has('mac') ? 'has-error' : '') }}">
                    <label for="mac">{{ __('t_customers.customers.form.label.mac') }}*</label>
                    <input type="text" id="mac" name="mac" class="form-control" required value="{{ old('mac', (isset($model->mac) ? $model->mac : '')) }}">
                    @if ($errors->has('mac')) <span class="help-block">{{ $errors->first('mac') }}</span> @endif
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
<script src="../../node_modules/inputmask/dist/jquery.inputmask.bundle.js"></script>
<script src="../../node_modules/inputmask/dist/inputmask/inputmask.extensions.js"></script>

<script type="text/javascript">
$(function () {
    $('#mac').inputmask("mac");
});
</script>
@stop
