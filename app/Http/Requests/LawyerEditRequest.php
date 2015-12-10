<?php

namespace asoabo\Http\Requests;

use asoabo\Http\Requests\Request;

class LawyerEditRequest extends Request
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
        $rules = [
            'identification' => 'required|numeric',
            'registration_number' => 'required|max:255',
            'first_name'=> 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'email|max:255',
            'address' => 'max:255',
            'telephone' => 'numeric',
            'mobile'=> 'numeric',
        ];
        return $rules;
    }
}
