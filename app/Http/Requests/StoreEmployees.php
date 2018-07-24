<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployees extends FormRequest {

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
            'name' => trans('t_employees.employees.form.label.name'),
            'position' => trans('t_employees.employees.form.label.position'),          
        ];
    }

    public function rules() {
        return [
            'name' => 'required',
            'position' => 'required',          
        ];
    }

}
