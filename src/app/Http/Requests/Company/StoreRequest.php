<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'=>['required','string','max:256'],
            'email'=>['required','email','unique:companies','max:128'],
            'logo'=>['image','mimes:jpeg,png,jpg','max:5120'],
            'website'=>['string','max:128']
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Заповність поле назва компанії',
            'first_name.string'=>'Назва повинна бути строкою',
            'email.required'=>'Заповніть це поле',
            'email.string'=>'Пошта повинна бути строкою',
            'email.email'=>'Ваш email повиннен бути в форматі test@test.com',
            'email.unique'=>'Компанія з таким email вже існує',
            'logo.max'=>"Фото важить більше 5 Мб",
            'website.string'=>'Назва сайту повинна бути строкою'
        ];
    }
}
