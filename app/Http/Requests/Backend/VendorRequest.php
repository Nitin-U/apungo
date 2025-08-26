<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // add auth logic if needed
    }

    public function rules(): array
    {
        $rules = [
            // Vendor-specific
            'title'       => 'nullable|string|max:255',
            'about_me'    => 'nullable|string',
            'experience'  => 'nullable|integer',
            'rating'      => 'nullable|numeric|min:0|max:5',
            'verified'    => 'required|boolean',
            'availability'=> 'nullable|boolean',
            'agreement'   => 'nullable|string',

            // User-specific
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255|unique:users,email,' . $this->id,
            'contact'     => 'nullable|string|max:20',
            'address'     => 'nullable|string|max:255',
            'status'      => 'nullable|boolean',
        ];

        // Password only required on create
        if ($this->isMethod('post')) {
            $rules['password_input'] = 'required|string|min:6|confirmed';
        } else {
            $rules['password_input'] = 'nullable|string|min:6|confirmed';
        }

        return $rules;
    }
}
