<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NeedyRequest extends FormRequest
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
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'father_name' => 'nullable|max:45|string',
            'phone_number'=> 'nullable|min:6|max:20',
            'hometown' => 'nullable|max:255',
            'current_address' => 'required|min:3|max:50',
            'date_birth' => 'nullable|date',
            'gender' => 'required|max:2|min:0',
            'id_card_number' => 'nullable|min:5',
            'needy_percentage' => 'required|min:0|max:100',
            'predictive_needs' => 'required|string|max:700',
            'person_type_id' => 'required|min:1',         
            'user_id' => 'required|min:1',         
            'description' => 'nullable|max:500',
            'image' => 'mimes:png,jpg,jpeg',
            // 'status' => 'required|max:1|min:0',
        ];
    }
}
