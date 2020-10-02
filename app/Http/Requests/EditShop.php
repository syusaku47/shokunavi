<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditShop extends CreateShop
{
    public function rules()
    {
        $rule = parent::rules();
        return $rule + [
            'image'=>'image|file',
        ];
    }

    public function attributes()
    {
        $attributes = parent::attributes();

        return $attributes ;
    }
}
