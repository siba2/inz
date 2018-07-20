<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIptablesNode extends FormRequest
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
            'ipaddr' => trans('t_iptables.iptables.node.form.label.ipaddr'),          
        ];
    }

    public function rules() {
        return [
            'ipaddr' => 'required|ipv4',          
        ];
    }
}
