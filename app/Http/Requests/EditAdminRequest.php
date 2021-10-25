<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAdminRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'string', 'min:2']
        ];
    }

    public function messages()
    {
        return [
            'required' =>   'Поле :attribute обязательно для заполнения',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'имя пользователя',
            'email' => 'E-Mail адрес'
        ];
    }
}
