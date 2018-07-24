<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomer extends FormRequest
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
            'name' => trans('t_customers.customers.form.label.name'),
            'lastname' => trans('t_customers.customers.form.label.lastname'),
            'email' => trans('t_customers.customers.form.label.email'),
            'zip' => trans('t_customers.customers.form.label.zip'),
            'city' => trans('t_customers.customers.form.label.city'),
            'phone' => trans('t_customers.customers.form.label.phone'),
            'address' => trans('t_customers.customers.form.label.address'),
        ];
    }

    public function rules() {
        return [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'zip' => 'required',
            'city' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
        ];
    }
}
