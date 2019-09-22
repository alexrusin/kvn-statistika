<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:250|unique:teams',
            'city' => 'required|max:250',
            'image_url' => 'required',
            'rating' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Пожалуйста введите название команды',
            'name.max' => 'Название команды слишком длинное',
            'name.unique' => 'Команда с таким названием существует',
            'city.required' => 'Пожалуйста введите название города',
            'city.max' => 'Название города слишком длинное',
            'image_url.required' => 'Пожалуйста введите ссылку для фото',
            'rating.required' => 'Пожалуйста введите рейтинг'
        ];
    }
}
