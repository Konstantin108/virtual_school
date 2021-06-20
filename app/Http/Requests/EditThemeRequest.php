<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditThemeRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:2'],
            'text' => ['required', 'string', 'min:2'],
            'status' => ['required', 'string', 'min:2']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Заполните поле :attribute',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'заголовок',
            'text' => 'содержание темы',
        ];
    }
}
