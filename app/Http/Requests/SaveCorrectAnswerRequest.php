<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCorrectAnswerRequest extends FormRequest
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
            'theme_id' => ['required', 'int', 'min:1'],
            'text' => ['required', 'string', 'min:2'],
            'answer_1' => ['required', 'string', 'min:2'],
            'answer_2' => ['required', 'string', 'min:2'],
            'answer_3' => ['required', 'string', 'min:2'],
            'answer_4' => ['required', 'string', 'min:2'],
            'quest_number' => ['required', 'int', 'min:1'],
            'correct_answer' => ['required', 'string', 'min:2']
        ];
    }

    public function messages()
    {
        return [
            'required' =>   'Поле является обязательным к заполнению',
            'min' => [
                'string' => 'Вы не указали правильный ответ'
            ],
        ];
    }
}
