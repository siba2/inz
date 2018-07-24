<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreSchedule extends FormRequest {

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
            'start' => trans('t_schedule.schedule.model.start'),
            'title' => trans('t_schedule.schedule.model.title'),
        ];
    }

    public function rules() {
        return [
            'start' => 'required',
            'title' => 'required',
        ];
    }

}
