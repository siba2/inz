<form method="post"  action="/customers/update" >
     <input type="hidden" id="id" name="id" value="{{ $model->id or old('id') }}">
   @include('customers/forms/body')
</form>
