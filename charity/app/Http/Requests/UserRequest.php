<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            // 'email' => 'required|email|unique:users,email',
            // 'password' => 'required|min:6',
            // 'confirm_password' => 'required_with:password|min:6|same:password',
            'phone_number'=> 'nullable|unique:users,phone_number',
            'hometown' => 'nullable|string|min:2|max:200',
            'current_address' => 'nullable|string|min:2|max:200',
            'gender' => 'required|min:0|max:1',
            'status' => 'required|min:0|max:1',
            'date_birth' => 'nullable|date',
            'image' => 'mimes:png,jpg,jpeg',
            'description' => 'nullable|string|min:2|max:500',
            'role_id'=> 'required|numeric',        
        ];
    }
}
