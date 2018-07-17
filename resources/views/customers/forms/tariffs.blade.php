<form method="post"  action="/customers/tariffs/store">
    <input type="hidden" id="id" name="id" value="{{ $model->id or old('id') }}">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('t_customers.tariffs.config.header.central') }}</h3>
            </div>
            <!-- /.box-header -->
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label>{{ __('t_customers.tariffs.config.label.tariffs') }}</label>
                    <div class="row">
                        <div class="col-xs-5">
                            <center><label>{{ __('t_customers.tariffs.config.label.source') }}</label></center>
                            <select name="tariffs_multiselect[]" id="tariffs_multiselect" class="multiselect form-control" size="8" multiple="multiple" data-right="#tariffs" data-right-all="#right_All" data-right-selected="#right_Selected" data-left-all="#left_All" data-left-selected="#left_Selected">                         
                                @foreach($tariffs as $tariff)
                                <option value="{{$tariff->id}}" @foreach($tariffsA as $A) @if(isset($model) and $tariff->id == $A->id_traffis ) class="move_tariffs" @endif @endforeach >{{$tariff->name}}</option>
                                @endforeach
                            </select>
                        </div>                            
                        <div class="col-xs-2 ">   
                            <label>&nbsp</label>
                            <button type="button" id="right_All" class="btn btn-block btn-primary"><i class="glyphicon glyphicon-forward"></i></button>
                            <button type="button" id="right_Selected" class="btn btn-block btn-primary"><i class="glyphicon glyphicon-chevron-right"></i></button>
                            <button type="button" id="left_Selected" class="btn btn-block btn-primary"><i class="glyphicon glyphicon-chevron-left"></i></button>
                            <button type="button" id="left_All" class="btn btn-block btn-primary"><i class="glyphicon glyphicon-backward"></i></button>
                        </div>
                        <div class="col-xs-5">
                            <center><label>{{ __('t_customers.tariffs.config.label.target') }}</label></center>
                            <select name="tariffs[]" id="tariffs" class="form-control" size="8" multiple="multiple"></select>
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
</form>
@section('css')
<link rel="stylesheet" href="../../../../node_modules/multiselect-two-sides/css/style.css">
@stop

@section('js')
<script src="../../../../node_modules/multiselect-two-sides/dist/js/multiselect.js"></script>

<script type="text/javascript">
$(document).ready(function () {

    $('#tariffs_multiselect').multiselect();

    $('#tariffs').append($(".move_tariffs"));


});
</script>
@stop