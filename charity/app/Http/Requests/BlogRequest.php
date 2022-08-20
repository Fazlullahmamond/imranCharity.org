<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:200',
            'text' => 'required|string|min:3|max:500',
            'image' => 'required_without:video_url|mimes:png,jpg,jpeg',
            'video_url' => 'required_without:image',
            'user_id' =>'required|numeric'

        ];
    }
}
