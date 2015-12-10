<?php

namespace asoabo\Http\Requests;

use asoabo\Http\Requests\Request;

class PasswordResetRequest extends Request
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
            'user' => 'required',
            'new_password' => 'confirmed|min:6',
            'new_user' => 'unique:users,user'
        ];
    }
}
