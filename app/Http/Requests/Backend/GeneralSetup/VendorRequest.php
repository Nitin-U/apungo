<?php

namespace App\Http\Requests\Backend\GeneralSetup;

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
            'about_me'    => 'nullable|string',
            'experience'  => 'required|integer',
            'rating'      => 'nullable|numeric|min:0|max:5',
            'verified'    => 'required|boolean',
            'availability'=> 'nullable|boolean',
            'agreement'   => 'nullable|string',
            'email'       => 'required|email|max:255|unique:vendors,email,'. $this->vendor_management,


            // User-specific
            'name'        => 'required|string|max:255',
            'contact'     => 'nullable|string|max:20',
            'address'     => 'nullable|string|max:255',
            'status'      => 'nullable|boolean',
            // Services (must select at least one)
            'services'    => 'required|array|min:1',
            'services.*'  => 'exists:services,id',
        ];

        // Password only required on create
        if ($this->isMethod('post')) {
            $rules['password_input'] = 'required|string|min:6|confirmed';
        } else {
            $rules['password_input'] = 'nullable|string|min:6|confirmed';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'services.required' => 'You must select at least one service.',
            'services.min'      => 'You must select at least one service.',
            'email.unique'      => 'The vendor with this email already exists',
        ];
    }
}
