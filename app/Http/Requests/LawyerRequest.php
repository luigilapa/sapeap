<?php

namespace asoabo\Http\Requests;

use asoabo\Http\Requests\Request;

class LawyerRequest extends Request
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

    public function rules()
    {
        $rules = [
            'identification' => 'required|numeric|unique:lawyer,identification,:identification',
            'registration_number' => 'required|unique:lawyer,registration_number,:registration_number|max:255',
            'first_name'=> 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'email|max:255',
            'address' => 'max:255',
            'telephone' => 'numeric',
            'mobile'=> 'numeric',
        ];
        return $rules;
    }

//'identification' => 'required|numeric|unique:lawyer,id,:id',
}
