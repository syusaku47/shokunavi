<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateContent extends FormRequest
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
            'name'=>'required|max:20',
            'catchcopy'=>'required|max:200',
            'recommend'=>'required|max:200',
            'menu_name'=>'required|max:20',
            'price'=>'required',
            'description'=>'max:200',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '店舗名',
            'catchcopy' => 'お店紹介文',
            'recommend' => '本日のおすすめ',
            'menu_name' => '品名',
            'price' => '金額',
            'description' => 'おすすめポイント',
        ];
    }
}
