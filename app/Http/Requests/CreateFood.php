<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFood extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'menu_name.*'=>'required|max:20',
            'price.*'=>'required',
            'description.*'=>'max:200',
        ];
    }

    public function attributes()
    {
        return [
            'menu_name.*' => '品名',
            'price.*' => '金額',
            'description.*' => 'おすすめポイント',
        ];
    }
}
