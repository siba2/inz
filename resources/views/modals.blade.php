<div class="modal fade" id="modal-confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>{{ __('t_common.confirm') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{ __('t_common.cancel') }}</button>
                <button type="button" class="btn btn-primary" id="modal-confirm-button">{{ __('t_common.yes') }}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-schedule">
    <form method="post" action="/schedule/store">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-xs-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ __('t_schedule.schedule.modal.schedule') }}</h3>
                            </div>
                            <!-- /.box-header -->
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group {{ ($errors->has('start') ? 'has-error' : '') }}">
                                    <label for="start">{{ __('t_schedule.schedule.modal.start') }}*</label>
                                    <input type="text" id="start" name="start" class="form-control">
                                    @if ($errors->has('start')) <span class="help-block">{{ $errors->first('start') }}</span> @endif
                                </div>
                                <div class="form-group {{ ($errors->has('title') ? 'has-error' : '') }}">
                                    <label for="title">{{ __('t_schedule.schedule.modal.title') }}*</label>
                                    <input type="text" id="title" name="title" class="form-control">
                                    @if ($errors->has('title')) <span class="help-block">{{ $errors->first('title') }}</span> @endif
                                </div>
                            </div>
                            <!-- ./box-body -->
                            <div class="box-footer">
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">{{ __('t_common.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('t_common.submit') }}</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div>
<!-- /.modal -->
