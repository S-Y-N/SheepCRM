<?php

namespace App\Http\Requests\Employee;


use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateRequest extends FormRequest
{
    public function rules(Employee $employee): array
    {
        $phoneRules = [
            'nullable',
            'string',
            'max:32',
        ];
        if($employee->phone){
            $phoneRules[] =  Rule::unique('employees', 'phone')->ignore($employee->id);
        }
        return [
            'company_id' => ['nullable', 'int', 'min:1'],
            'first_name' => ['nullable', 'string', 'max:128'],
            'last_name' => ['nullable', 'string', 'max:128'],
            'email' => ['nullable', 'email', 'max:128'],
            'phone' => $phoneRules,
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
            'email.unique'=>'Користувач з таким email вже існує',
            'phone.unique'=>'Даний номер зайнятий'
        ];
    }
}
