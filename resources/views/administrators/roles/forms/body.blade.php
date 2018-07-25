<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('t_administrators.roles.form.header.central') }}</h3>
        </div>
        <!-- /.box-header -->
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group {{ ($errors->has('name') ? 'has-error' : '') }}">
                <label for="name">{{ __('t_administratorsistrators.roles.form.label.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', (isset($model->name) ? $model->name : '')) }}">
                @if ($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span> @endif
            </div>         
            <div class="form-group">
                <label>{{ __('t_administrators.roles.form.label.permissions') }}</label>
                <div class="row">
                    <div class="col-xs-5">
                        <center><label>{{ __('t_common.multiselect_source') }}</label></center>
                        <select name="from[]" class="multiselect form-control" size="8" multiple="multiple" data-right="#permissions" data-right-all="#right_All" data-right-selected="#right_Selected" data-left-all="#left_All" data-left-selected="#left_Selected">
                            @foreach($permissions as $permission)
                            <option @if(isset($model->id)) @foreach($permissionsUsed as $permissionUsed) @if($permissionUsed->name == $permission->name) class="move" @endif @endforeach @endif value="{{$permission->name}}" >{{$permission->name}}</option>
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
                        <select name="permissions[]" id="permissions" class="form-control" size="8" multiple="multiple"></select>
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
        $('.multiselect').multiselect();
        $('#permissions').append($(".move"));
    });
</script>
@stop
