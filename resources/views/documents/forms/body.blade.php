<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('t_documents.documents.form.header.documents') }}</h3>
        </div>
        <!-- /.box-header -->
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group {{ ($errors->has('data') ? 'has-error' : '') }}">
                <label for="data">{{ __('t_documents.documents.form.label.data') }}(wav)*</label>
                <input type="file" id="data" name="data"  value="" >
                @if ($errors->has('data')) <span class="help-block">{{ $errors->first('data') }}</span> @endif
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
