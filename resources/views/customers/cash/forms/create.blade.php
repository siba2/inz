<form method="post"  action="/iptables/store" >
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('t_customers.customers.cash.form.header.central') }}</h3>
            </div>
            <!-- /.box-header -->
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group {{ ($errors->has('') ? 'has-error' : '') }}">
                    <label for="">{{ __('t_customers.customers.cash.form.label.') }}*</label>
                    <input type="text" id="" name="" class="form-control" required>                  
                </div>    
                <div class="form-group {{ ($errors->has('') ? 'has-error' : '') }}">
                    <label for="">{{ __('t_customers.customers.cash.form.label.') }}*</label>
                    <input type="text" id="" name="" class="form-control" required>                  
                </div>  
                <div class="form-group {{ ($errors->has('') ? 'has-error' : '') }}">
                    <label for="">{{ __('t_customers.customers.cash.form.label.') }}*</label>
                    <input type="text" id="" name="" class="form-control" required>                  
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
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
@stop
