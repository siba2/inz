<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUsers extends FormRequest
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
            'name' => trans('t_admin.admin.form.label.name'),
            'email' => trans('t_admin.aadmin.form.label.email'),
            'password' => trans('t_admin.aadmin.form.label.password'),
        ];
    }

    public function rules(Request $request) {
        return [
            'name' => 'required|unique:users,name,' . $request->id,
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password'      => 'confirmed',
        ];
    }
}
