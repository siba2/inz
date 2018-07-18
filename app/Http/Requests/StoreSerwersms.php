<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSerwersms extends FormRequest {

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
            'phone' => trans('t_serwersms.serwersms.form.label.phone'),
            'text' => trans('t_serwersms.serwersms.form.label.text'),
        ];
    }

    public function rules() {
        return [
            'phone' => 'required|numeric',
            'text' => 'required|string|min:3|max:200',
        ];
    }

}
