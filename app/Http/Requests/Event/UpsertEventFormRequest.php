<?php

namespace App\Http\Requests\Event;

use Route;
use Illuminate\Foundation\Http\FormRequest;

class UpsertEventFormRequest extends FormRequest {
   
    public function attributes() {

        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'start_at' => 'Start At',
            'end_at' => 'End At',
        ];

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        $rules = [
            "name" => "required|string|unique:events,name,{$this->id},id,deleted_at,NULL",
            "slug" => "required|string|unique:events,slug,{$this->id},id,deleted_at,NULL",
            "start_at" => "required|before:end_at",
            "end_at" => "required|after:start_at",
        ];

        if (Route::currentRouteName() == 'event.update') {

            $rules = array_merge($rules, ['id' => "exists:events,id,deleted_at,NULL"]);

        }

        return $rules;

    }

}
