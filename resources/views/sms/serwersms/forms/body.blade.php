<div class="col-xs-5">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('t_serwersms.serwersms.form.header.serwersms') }}</h3>
        </div>
        <!-- /.box-header -->
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group {{ ($errors->has('phone') ? 'has-error' : '') }}">
                <label for="phone">{{ __('t_serwersms.serwersms.form.label.phone') }}*</label>
                <input type="text" id="phone" name="phone" class="form-control" required value="{{ old('phone', (isset($model->phone) ? $model->phone : '')) }}">
                @if ($errors->has('phone')) <span class="help-block">{{ $errors->first('phone') }}</span> @endif
            </div> 
            <div class="form-group {{ ($errors->has('phone') ? 'has-error' : '') }}">
                <label for="text">{{ __('t_serwersms.serwersms.form.label.text') }}*</label>
                <textarea id="text" name="text" class="form-control" rows="3" placeholder=""></textarea>
                 @if ($errors->has('text')) <span class="help-block">{{ $errors->first('text') }}</span> @endif
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
<div class="col-xs-7"></div>