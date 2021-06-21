<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'email' => ['required', 'string', 'min:2'],
            'is_admin' => ['required', 'string', 'min:1'],
            'rating' => ['required', 'int', 'min:0']
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
            'email' => 'E-Mail адрес',
            'rating' => 'рейтинг пользователя'
        ];
    }
}
