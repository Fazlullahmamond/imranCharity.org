<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SponsorRequest extends FormRequest
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
            'first_name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            // 'email' => 'required|email|unique:users',
            // 'password' => 'required|max:40',
            'hometown' => 'nullable|string|min:2|max:200',
            'current_address' => 'nullable|string|min:2|max:200',
            'gender' => 'required|max:2|min:0',
            'date_birth' => 'nullable|date',
            'status' => 'required|max:1|min:0',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'description' => 'nullable|min:3|max:500',
        ];
    }
}
