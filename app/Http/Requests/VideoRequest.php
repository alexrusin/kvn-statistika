<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'title' => 'required|max:250',
            'youtube_id' => 'required|max:250',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Пожалуйста введите название видео',
            'title.max' => 'Название видео слишком длинное',
            'youtube_id.required' => 'Пожалуйста введите YouTube ID',
            'youtube_id.max' => 'YouTube ID слишком длинное',
           
        ];
    }
}
