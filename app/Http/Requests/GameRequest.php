<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'tournament_round' => 'required',
            'round_stage' => 'required',
            'season' => 'required',
            'division' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tournament_round.required' => 'Пожалуйста выберите круг',
            'round_stage.required' => 'Пожалуйста выберите стадию',
            'season.required' => 'Пожалуйста выберете год',
            'division.required' => 'Пожалуйста выберете лигу'
        ];
    }
}
