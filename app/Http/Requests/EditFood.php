<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditFood extends CreateFood
{
    public function rules()
    {
        $rule = parent::rules();
        return $rule;
    }

    public function attributes()
    {
        $attributes = parent::attributes();

        return $attributes ;
    }
}
