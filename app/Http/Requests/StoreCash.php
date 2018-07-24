<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCash extends FormRequest {

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
            'name' => trans('customers.cash.form.label.name'),
            'value' => trans('customers.cash.form.label.value'),
        ];
    }

    public function rules() {
        return [
            'name' => 'required',
            'value' => 'required|numeric',           
        ];
    }

}
