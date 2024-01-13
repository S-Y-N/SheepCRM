<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name'=>['required','string','max:128'],
            'last_name'=>['required','string','max:128'],
            'email'=>['required','email','unique:employees','max:128'],
            'company_id'=>['required','int','min:1'],
            'phone'=>['required','string','unique:employees','max:32'],
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
            'phone.unique'=>'Даний номер зайнятий'
        ];
    }
}
