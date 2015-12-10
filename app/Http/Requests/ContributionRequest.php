<?php

namespace asoabo\Http\Requests;

use asoabo\Http\Requests\Request;

class ContributionRequest extends Request
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
            'amount' => 'required|min:0|regex:/^\d*(\.\d{2})?$/',
            'lawyer_id' => 'required',
            'year' => 'required',
            'month' => 'required',
            'description' => 'max:255',
        ];
    }
}
