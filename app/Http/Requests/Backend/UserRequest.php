<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'name'              => 'required',
            'email'             => 'required|email|unique:users,email,'.$this->user_management,
            'password_input'    => 'required_if:email,null|min:6',
            'contact'           => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                 => 'Please enter a name',
            'email.required'                => 'Please enter a email',
            'password_input.required_if'    => 'Please enter a password',
            'contact.required'              => 'Please enter a contact number',
            'email.unique'                  => 'The email is already in registered',
            'email.email'                   => 'Please enter a email in proper format',

        ];
    }
}
