<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTariff extends FormRequest
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
            'name' => trans('t_tariffs.tariffs.form.label.name'),
            'value' => trans('t_tariffs.tariffs.form.label.value'),
        ];
    }

    public function rules(Request $request) {
        return [
            'name' => 'required|unique:mysql_manager.tariffs,name,' . $request->id,
            'value' => 'required|numeric',
        ];
    }
}
