<form method="post"  action="/customers/iptable/store">
    <input type="hidden" id="id" name="id" value="{{ $model->id or old('id') }}">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('t_customers.iptable.config.header.central') }}</h3>
            </div>
            <!-- /.box-header -->
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="class">{{ __('t_customers.customers.form.label.class') }}</label>
                    <select type="text" id="class" name="class" class="form-control">
                        @foreach($arrClass as $key => $class)
                        <option value="{{$key}}" @if($usedClass == $key) selected @endif >{{$class}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ipaddr">{{ __('t_customers.customers.form.label.ipaddr') }}</label>
                    <select type="text" id="ipaddr" name="ipaddr" class="form-control">
                    </select>
                </div>
                <div class="form-group {{ ($errors->has('mac') ? 'has-error' : '') }}">
                    <label for="mac">{{ __('t_customers.customers.form.label.mac') }}*</label>
                    <input type="text" id="mac" name="mac" class="form-control" required value="{{ old('mac', (isset($iptables->mac) ? $iptables->mac : '')) }}">
                    @if ($errors->has('mac')) <span class="help-block">{{ $errors->first('mac') }}</span> @endif
                </div> 
                <div class="form-group {{ ($errors->has('comment') ? 'has-error' : '') }}">
                    <label for="comment">{{ __('t_customers.customers.form.label.comment') }}</label>
                    <input type="text" id="comment" name="comment" class="form-control"  value="{{ old('comment', (isset($iptables->comment) ? $iptables->comment : '')) }}">
                    @if ($errors->has('comment')) <span class="help-block">{{ $errors->first('comment') }}</span> @endif
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
        $('#mac').inputmask("mac");
        $('#class').change(function () {

            var ip = $('#class').val();
            var idCustomer = $('#id').val();
            $.ajax({
                type: "post",
                url: '/customers/listip',
                data: {
                    ip: ip,
                    idCustomer: idCustomer
                },
                success: function (arr) {

                    $('#ipaddr').find('option').remove();

                    $.each(arr, function (index, item) {

                        var newOption = new Option(item, item);
                        if(item === '{{$usedIp}}'){
                            newOption.setAttribute('selected', true);
                        }
                        $('#ipaddr').append(newOption);
                    });
                }
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#class').change();
    });
</script>
@stop
