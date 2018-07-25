<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('t_administrators.users.form.header.central') }}</h3>
        </div>
        <!-- /.box-header -->
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group {{ ($errors->has('name') ? 'has-error' : '') }}">
                <label for="name">{{ __('t_administrators.users.form.label.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', (isset($model->name) ? $model->name : '')) }}">
                @if ($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span> @endif
            </div>    
            <div class="form-group {{ ($errors->has('email') ? 'has-error' : '') }}">
                <label for="email">{{ __('t_administrators.users.form.label.email') }}*</label>
                <input type="text" id="email" name="email" class="form-control" required value="{{ old('email', (isset($model->email) ? $model->email : '')) }}">
                @if ($errors->has('email')) <span class="help-block">{{ $errors->first('email') }}</span> @endif
            </div>  
            <div class="form-group {{ ($errors->has('password') ? 'has-error' : '') }}">
                <label for="password">{{ __('t_administrators.users.form.label.password') }}</label>
                <input type="text" id="password" name="password" class="form-control" value="">
                @if ($errors->has('password')) <span class="help-block">{{ $errors->first('password') }}</span> @endif
            </div>  
            <div class="form-group {{ ($errors->has('password') ? 'has-error' : '') }}">
                <label for="password_confirmation">{{ __('t_administrators.users.form.label.password_confirmation') }}</label>
                <input type="text" id="password_confirmation" name="password_confirmation" class="form-control" value="">
                @if ($errors->has('password')) <span class="help-block">{{ $errors->first('password') }}</span> @endif
            </div> 
            <div class="form-group">
                <label>{{ __('t_administrators.users.form.label.roles') }}</label>
                <div class="row">
                    <div class="col-xs-5">
                        <center><label>{{ __('t_common.multiselect_source') }}</label></center>
                        <select name="from[]" class="multiselect form-control" size="8" multiple="multiple" data-right="#roles" data-right-all="#right_All" data-right-selected="#right_Selected" data-left-all="#left_All" data-left-selected="#left_Selected">
                            @foreach($roles as $role)
                            <option @if(isset($model->id)) @foreach($rolesUsed as $roleUsed) @if($roleUsed->name == $role->name) class="move" @endif @endforeach @endif value="{{$role->name}}" >{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>                  
                    <div class="col-xs-2">
                        <label>&nbsp</label>
                        <button type="button" id="right_All" class="btn btn-block btn-primary"><i class="glyphicon glyphicon-forward"></i></button>
                        <button type="button" id="right_Selected" class="btn btn-block btn-primary"><i class="glyphicon glyphicon-chevron-right"></i></button>
                        <button type="button" id="left_Selected" class="btn btn-block btn-primary"><i class="glyphicon glyphicon-chevron-left"></i></button>
                        <button type="button" id="left_All" class="btn btn-block btn-primary"><i class="glyphicon glyphicon-backward"></i></button>
                    </div>

                    <div class="col-xs-5">
                        <center><label>{{ __('t_common.multiselect_destination') }}</label></center>
                        <select name="roles[]" id="roles" class="form-control" size="8" multiple="multiple"></select>
                    </div>
                </div>
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
    $(function () {
        $('#zip').inputmask("99-999");
         $('.multiselect').multiselect();
        $('#roles').append($(".move"));
    });
</script>
@stop