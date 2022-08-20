<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'contract_title' => 'required|string|min:3|max:200',
            'contract_with' => 'required|string|min:3|max:200',
            'contract_startDate' => 'required|date',
            'contract_endDate' => 'required|date',
            'description' => 'required|string|min:3|max:500',
        ];
    }
}
