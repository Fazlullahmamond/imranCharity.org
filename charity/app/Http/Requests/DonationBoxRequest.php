<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationBoxRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:50',
            'location' => 'required|string|min:2|max:100',
            'status' => 'required|numeric|between:0,1',
            'user_id' => 'required|numeric',
            'description' => 'nullable|min:2|max:250|string'

        ];
    }
}
