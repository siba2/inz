<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('t_customers.customers.form.header.central') }}</h3>
        </div>
        <!-- /.box-header -->
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group {{ ($errors->has('name') ? 'has-error' : '') }}">
                <label for="name">{{ __('t_customers.customers.form.label.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', (isset($model->name) ? $model->name : '')) }}">
                @if ($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span> @endif
            </div>    
            <div class="form-group {{ ($errors->has('lastname') ? 'has-error' : '') }}">
                <label for="lastname">{{ __('t_customers.customers.form.label.lastname') }}*</label>
                <input type="text" id="lastname" name="lastname" class="form-control" required value="{{ old('lastname', (isset($model->lastname) ? $model->lastname : '')) }}">
                @if ($errors->has('lastname')) <span class="help-block">{{ $errors->first('lastname') }}</span> @endif
            </div>  
            <div class="form-group {{ ($errors->has('email') ? 'has-error' : '') }}">
                <label for="email">{{ __('t_customers.customers.form.label.email') }}*</label>
                <input type="text" id="email" name="email" class="form-control" required value="{{ old('email', (isset($model->email) ? $model->email : '')) }}">
                @if ($errors->has('email')) <span class="help-block">{{ $errors->first('email') }}</span> @endif
            </div>  
            <div class="form-group {{ ($errors->has('zip') ? 'has-error' : '') }}">
                <label for="zip">{{ __('t_customers.customers.form.label.zip') }}*</label>
                <input type="text" id="zip" name="zip" class="form-control" required value="{{ old('zip', (isset($model->zip) ? $model->zip : '')) }}">
                @if ($errors->has('zip')) <span class="help-block">{{ $errors->first('zip') }}</span> @endif
            </div> 
            <div class="form-group {{ ($errors->has('city') ? 'has-error' : '') }}">
                <label for="city">{{ __('t_customers.customers.form.label.city') }}*</label>
                <input type="text" id="city" name="city" class="form-control" required value="{{ old('city', (isset($model->city) ? $model->city : '')) }}">
                @if ($errors->has('city')) <span class="help-block">{{ $errors->first('city') }}</span> @endif
            </div>  
            <div class="form-group {{ ($errors->has('phone') ? 'has-error' : '') }}">
                <label for="phone">{{ __('t_customers.customers.form.label.phone') }}*</label>
                <input type="text" id="phone" name="phone" class="form-control" required value="{{ old('phone', (isset($model->phone) ? $model->phone : '')) }}">
                @if ($errors->has('phone')) <span class="help-block">{{ $errors->first('phone') }}</span> @endif
            </div>  
            <div class="form-group {{ ($errors->has('address') ? 'has-error' : '') }}">
                <label for="address">{{ __('t_customers.customers.form.label.address') }}*</label>
                <input type="text" id="address" name="address" class="form-control" required value="{{ old('address', (isset($model->address) ? $model->address : '')) }}">
                @if ($errors->has('address')) <span class="help-block">{{ $errors->first('address') }}</span> @endif
            </div>  
            <div class="form-group {{ ($errors->has('info') ? 'has-error' : '') }}">
                <label for="info">{{ __('t_customers.customers.form.label.info') }}</label>
                <input type="text" id="info" name="info" class="form-control" value="{{ old('info', (isset($model->info) ? $model->info : '')) }}">
                @if ($errors->has('info')) <span class="help-block">{{ $errors->first('info') }}</span> @endif
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
<script src="../../node_modules/inputmask/dist/jquery.inputmask.bundle.js"></script>
<script src="../../node_modules/inputmask/dist/inputmask/inputmask.extensions.js"></script>

<script type="text/javascript">
$(function () {
    $('#zip').inputmask("99-999");
});
</script>
@stop