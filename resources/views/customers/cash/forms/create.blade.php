<form method="post"  action="/customers/cash/store" >
    <input type="hidden" id="id" name="id" value="{{ $model->id or old('id') }}">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('t_customers.customers.cash.form.header.central') }}</h3>
            </div>
            <!-- /.box-header -->
            {{ csrf_field() }}
            <div class="box-body">
                <div  id="formManualTariff" class="form-group">
                    <label for="global">{{ __('t_customers.customers.cash.form.label.manualTariff') }}</label>
                    <div>
                        <center><input type="checkbox" id="manualTariff" name="manualTariff" ></center> 
                    </div>
                </div>
                <div id="formTariff" class="form-group">
                    <label for="tariff">{{ __('t_customers.customers.cash.form.label.tariff') }}</label>
                    <select type="text" id="tariff" name="tariff" class="form-control">
                        @foreach($tariffs as $tariff)
                        <option value="{{$tariff->id}}">{{$tariff->name}} - {{$tariff->value}} {{ __('t_customers.customers.cash.form.currency') }}</option>
                        @endforeach                     
                    </select>
                </div>
                <div hidden="" id="formName" class="form-group {{ ($errors->has('name') ? 'has-error' : '') }}">
                    <label for="name">{{ __('t_customers.customers.cash.form.label.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" required>         
                    @if ($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span> @endif
                </div>    
                <div hidden="" id="formValue" class="form-group {{ ($errors->has('value') ? 'has-error' : '') }}">
                    <label for="value">{{ __('t_customers.customers.cash.form.label.value') }}</label>
                    <input type="text" id="value" name="value" class="form-control" >       
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
</form>
@section('js')
<script type="text/javascript">
    $(document).ready(function () {

        var tariffs = '{{$tariffs}}';

        if (tariffs.length) {
            $('#manualTariff').prop("checked", true);
            $('#formManualTariff').hide();
            $('#tariff').prop("disabled", true);
            $('#name').prop("disabled", false);
            $('#value').prop("disabled", false);
            $('#formTariff').hide();
            $('#formName').show();
            $('#formValue').show();


        } else {
            $('#manualTariff').change();
        }

        $('#manualTariff').on('change', function () {
            if ($(this).prop('checked')) {

                $('#tariff').prop("disabled", true);
                $('#name').prop("disabled", false);
                $('#value').prop("disabled", false);
                $('#formTariff').hide();
                $('#formName').show();
                $('#formValue').show();
            } else {

                $('#tariff').prop("disabled", false);
                $('#name').prop("disabled", true);
                $('#value').prop("disabled", false);
                $('#formTariff').show();
                $('#formName').hide();
                $('#formValue').hide();
            }
        });

    });
</script>
@stop
