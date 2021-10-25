<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAccountRequest extends FormRequest
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
            'password' => ['required', 'string', 'min:1'],
            'email' => ['required', 'string', 'min:2'],
        ];
    }

    public function messages()
    {
        return [
            'required' =>   'Введите :attribute',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'имя',
            'email' => 'E-Mail адрес',
        ];
    }
}
