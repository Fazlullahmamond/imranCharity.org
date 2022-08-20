<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CauseRequest extends FormRequest
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
            'cause_title' => 'required|string|min:3|max:200',
            'cause_description' => 'required|string|min:3|max:500',
            'cause_goal' => 'required|integer|min:1',
            'cause_raised' => 'required|integer|min:1',
        ];
    }
}
