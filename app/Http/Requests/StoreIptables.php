<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIptables extends FormRequest
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
            'class' => trans('t_iptables.iptables.form.label.class'),          
        ];
    }

    public function rules() {
        return [
            'class' => 'required|ipv4',          
        ];
    }
}
