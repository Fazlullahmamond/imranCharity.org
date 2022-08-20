<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyMemberRequest extends FormRequest
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
            'father_name' => 'nullable|min:3|max:50',
            'phone_number'=> 'nullable|max:20',
            'job' => 'nullable|min:3|max:50|string',
            'date_birth' => 'nullable|date',
            'gender' => 'required|max:2|min:0',
            'image' => 'mimes:png,jpg,jpeg',
            'description' => 'nullable|min:3|max:500|string',
            'needy_people_id' => 'required|min:1|numeric',         
            'relationship_id' => 'required|min:1|numeric',         
        ];
    }
}
