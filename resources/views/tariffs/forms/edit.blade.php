<form method="post"  action="/tariffs/update" >
     <input type="hidden" id="id" name="id" value="{{ $model->id or old('id') }}">
   @include('tariffs/forms/body')
</form>
