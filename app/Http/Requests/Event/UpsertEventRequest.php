<?php

namespace App\Http\Requests\Event;

use Route;
use App\Http\Requests\APIBaseRequest;

class UpsertEventRequest extends APIBaseRequest {
   
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
            "start_at" => "required|date_format:Y-m-d H:i:s|before:end_at",
            "end_at" => "required|date_format:Y-m-d H:i:s|after:start_at",
        ];

        if (Route::currentRouteName() == 'event.update') {

            $rules = array_merge($rules, ['id' => "exists:events,id,deleted_at,NULL"]);

        }

        return $rules;

    }

}
