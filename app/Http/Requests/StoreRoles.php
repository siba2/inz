<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoles extends FormRequest
{
      public function authorize() {
        return true;
    }

    protected function formatErrors(Validator $validator) {
        $validator->setAttributeNames($this->attributes());
        $validator->passes();

        return $validator->errors()->getMessages();
    }

    public function attributes() {
        return [
            'name' => trans('t_administrators.roles.form.label.name'),          
        ];
    }

    public function rules() {
         return [
            'name' => 'required|unique:roles,name',          
        ];
    }
}
