<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
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

    public function rules(Request $request) {
        \Validator::extend('ipaddr_unique', function ($attribute, $value, $parameters, $validator ) {
           $ipaddr = $validator->getData()['ipaddr'];

            return !(\App\Iptables::where('ipaddr', '=', ip2long($ipaddr))->count() > 0);
        }, trans('validation.unique_ipaddr'));
        
        return [
            'ipaddr' => 'required|ipv4|ipaddr_unique',          
        ];
    }
}
