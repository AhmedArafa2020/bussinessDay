<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => [
                'required',
                'string',
                'max:150',
            ],

            'phone' => [
                'required',
                'string',
                'max:50',
            ],

            'email' => [
                'required',
                'email',
                'max:190',
            ],

            'interest' => [
                'required',
                'string',
                'max:100',
            ],

            'budget' => [
                'nullable',
                'string',
                'max:100',
            ],

            'contact_method' => [
                'required',
                'in:phone,whatsapp,email',
            ],

            'message' => [
                'nullable',
                'string',
                'max:3000',
            ],

            'company_website' => [
                'nullable',
                'max:0',
            ],
            'source' => [
                'nullable',
                'in:homepage,campaign-short',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Please enter your full name.',
            'phone.required' => 'Please enter your phone number.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'interest.required' => 'Please select a collection.',
            'contact_method.in' => 'Please select a valid contact method.',
            'company_website.max' => 'The request could not be processed.',
        ];
    }
}
