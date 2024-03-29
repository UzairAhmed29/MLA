<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
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
            'name' => 'required',
            'cnic' => 'required|min:13|max:15',
            'phone' => 'required|min:8|max:15',
            'dob' => 'required',
            'address' => 'required',
            'tax_type' => 'required',
        ];
    }
}
