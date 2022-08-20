<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonthlySponsorRequest extends FormRequest
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
            'user_id' => 'required|numeric',
            'needy_people_id' => 'required|numeric',
            'monthly_amount' => 'required|string|min:1',
            'duration' => 'required|date',
            'description' => 'nullable|string|min:2|max:500',
        ];
    }
}
