<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('t_admin.admin.form.header.central') }}</h3>
        </div>
        <!-- /.box-header -->
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group {{ ($errors->has('name') ? 'has-error' : '') }}">
                <label for="name">{{ __('t_admin.admin.form.label.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', (isset($model->name) ? $model->name : '')) }}">
                @if ($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span> @endif
            </div>    
            <div class="form-group {{ ($errors->has('email') ? 'has-error' : '') }}">
                <label for="email">{{ __('t_admin.admin.form.label.email') }}*</label>
                <input type="text" id="email" name="email" class="form-control" required value="{{ old('email', (isset($model->email) ? $model->email : '')) }}">
                @if ($errors->has('email')) <span class="help-block">{{ $errors->first('email') }}</span> @endif
            </div>  
            <div class="form-group {{ ($errors->has('password') ? 'has-error' : '') }}">
                <label for="password">{{ __('t_admin.admin.form.label.password') }}</label>
                <input type="text" id="email" name="password" class="form-control" value="">
                @if ($errors->has('password')) <span class="help-block">{{ $errors->first('password') }}</span> @endif
            </div>  
            <div class="form-group {{ ($errors->has('password_confirmation') ? 'has-error' : '') }}">
                <label for="password_confirmation">{{ __('t_admin.admin.form.label.password_confirmation') }}</label>
                <input type="text" id="password_confirmation" name="password_confirmation" class="form-control" value="">
                @if ($errors->has('password_confirmation')) <span class="help-block">{{ $errors->first('password_confirmation') }}</span> @endif
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