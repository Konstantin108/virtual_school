<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'user_id' => ['required', 'int', 'min:1'],
            'user_name' => ['required', 'string', 'min:2'],
            'problem_theme' => ['required', 'string', 'min:2'],
            'theme_title' => ['required', 'string', 'min:2'],
            'text' => ['required', 'string', 'min:1'],
            'created_at' => ['required', 'string', 'min:2'],
            'updated_at' => ['required', 'string', 'min:2']
        ];
    }

    public function messages()
    {
        return [
            'required' =>   'Не оставляйте это поле пустым',
            'min' => [
                'numeric' => 'Обязательно укажите :attribute',
                'string' => 'Выберите :attribute'
            ],
            'integer' => 'Обязательно укажите :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'problem_theme' => 'проблему',
            'theme_title' => 'тему',
        ];
    }
}
