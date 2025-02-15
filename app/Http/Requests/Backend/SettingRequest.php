<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'title'             => 'required|string|max:60',
            'email'             => 'required|email',
            'whatsapp'          => 'required',
            'logo_input'        => request()->method() == 'POST' ? 'required':'nullable'.'|image|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Please enter a title',
            'email.required'            => 'Please enter email',
            'email.email'               => 'Write email in proper format',
            'whatsapp.required'         => 'Please enter whatsapp number',
            'title.max'                 => 'Title must be less than 60 characters',
            'logo_input.required'       => 'Please select a logo',
        ];
    }
}
