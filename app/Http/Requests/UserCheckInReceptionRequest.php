<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCheckInReceptionRequest extends FormRequest
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
            'card_uuid' => 'required|alpha_num|exists:cards,card_uuid',
            'object_uuid' => 'required|alpha_num|exists:gyms,gym_uuid',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
                  'card_uuid.required' => 'Card UUID is required!',
                  'card_uuid.alpha_num' => 'Card UUID must be alphanumeric!',
                  'card_uuid.exists' => 'Card UUID does not exist!',
                  'object_uuid.required' => 'Object UUID is required!',
                  'object_uuid.alpha_num' => 'Object UUID must be alphanumeric!',
                  'object_uuid.exists' => 'Object UUID does not exist!',
            ];
    }
}
