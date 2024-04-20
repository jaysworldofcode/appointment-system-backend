<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPatientRequest extends FormRequest
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
            'firstname'             => ['required'],
            'lastname'              => ['required', 'max:70'],
            'phone_number'          => ['nullable'],
            'address'               => ['nullable'],
            'email'                 => ['nullable'],
            'status_id'             => ['required'],
        ];
    }
}