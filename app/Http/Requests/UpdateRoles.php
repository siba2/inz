<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoles extends FormRequest
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

    public function rules(Request $request) {
         return [
            'name' => 'required|unique:roles,name,'.$request->id,          
        ];
    }
}
