<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditContent extends CreateContent
{
    public function rules()
    {
        $rule = parent::rules();
    }
}
