<?php

namespace App\Http\Requests\Country;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function rules(Company $company): array
    {
        $emailRules = [
            'nullable',
            'string',
            'max:128',
        ];
        if($company->email){
            $emailRules[] =  Rule::unique('companies', 'email')->ignore($company->id);
        }
        return [
            'name'=>['nullable','string','max:256'],
            'email'=>$emailRules,
            'logo'=>['nullable','mimes:jpeg,png,jpg','max:5120'],
            'website'=>['nullable','string','max:128']
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
