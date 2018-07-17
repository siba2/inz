<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('t_tariffs.tariffs.form.header.central') }}</h3>
        </div>
        <!-- /.box-header -->
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group {{ ($errors->has('name') ? 'has-error' : '') }}">
                <label for="name">{{ __('t_tariffs.tariffs.form.label.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', (isset($model->name) ? $model->name : '')) }}">
                @if ($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span> @endif
            </div>    
            <div class="form-group {{ ($errors->has('value') ? 'has-error' : '') }}">
                <label for="value">{{ __('t_tariffs.tariffs.form.label.value') }}*</label>
                <input type="text" id="value" name="value" class="form-control" required value="{{ old('value', (isset($model->value) ? $model->value : '')) }}">
                @if ($errors->has('value')) <span class="help-block">{{ $errors->first('value') }}</span> @endif
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
