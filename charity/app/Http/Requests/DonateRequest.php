<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonateRequest extends FormRequest
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
            'user_id' => 'nullable|numeric',
            'donation_type_id' => 'required|numeric',
            'donation_amount' => 'required|numeric',
            'currency' => 'required|string',
            'donation_date' => 'required|date',
            'donation_delivery' => 'required|date',
            'needy_people_id' => 'nullable|numeric',
            'description' => 'required|string|max:500',
            'donation_location' => 'required|string|max:100',
            'donation_box_id' => 'nullable|numeric',
        ];
    }
}
