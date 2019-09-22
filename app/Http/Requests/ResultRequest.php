<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest
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
            'game_id' => 'required',
            'team_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'game_id.required' => 'Пожалуйста выберите игру',
            'team_id.required' => 'Пожалуйста выберите команду',
        ];
    }
}
