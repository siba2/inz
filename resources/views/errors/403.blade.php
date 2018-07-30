@extends('adminlte::master')

@section('body')
<div class="wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 403</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> {{ __('t_messages.error.403.header') }}</h3>

                <p>
                    {{ __('t_messages.error.403.label') }}
                </p>
                <p>
                    <a href="/">{{ __('t_messages.error.common.back') }}</a>
                </p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->

</div>
<!-- ./wrapper -->
@stop
