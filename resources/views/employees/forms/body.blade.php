<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('t_employees.employees.form.header.central') }}</h3>
        </div>
        <!-- /.box-header -->
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group {{ ($errors->has('name') ? 'has-error' : '') }}">
                <label for="name">{{ __('t_employees.employees.form.label.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', (isset($model->name) ? $model->name : '')) }}">
                @if ($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span> @endif
            </div>    
            <div class="form-group {{ ($errors->has('position') ? 'has-error' : '') }}">
                <label for="position">{{ __('t_employees.employees.form.label.position') }}*</label>
                <input type="text" id="position" name="position" class="form-control" required value="{{ old('position', (isset($model->position) ? $model->position : '')) }}">
                @if ($errors->has('position')) <span class="help-block">{{ $errors->first('position') }}</span> @endif
            </div>  
            <div class="form-group {{ ($errors->has('phone') ? 'has-error' : '') }}">
                <label for="phone">{{ __('t_employees.employees.form.label.phone') }}</label>
                <input type="text" id="phone" name="phone" class="form-control"  value="{{ old('phone', (isset($model->phone) ? $model->phone : '')) }}">
                @if ($errors->has('phone')) <span class="help-block">{{ $errors->first('phone') }}</span> @endif
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
