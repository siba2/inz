<form method="post"  action="/admin/update" >
     <input type="hidden" id="id" name="id" value="{{ $model->id or old('id') }}">
   @include('admin/forms/body')
</form>
