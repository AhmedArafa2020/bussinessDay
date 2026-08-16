<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'source' => $this->input('source', 'homepage'),

            'contact_method' => $this->input(
                'contact_method',
                'phone'
            ),
        ]);
    }

    public function rules(): array
    {
        return [
            'full_name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'phone' => [
                'required',
                'string',
                'max:100',
            ],

            'country' => [
                'required',
                'string',
                'max:100',
            ],

            'enquiry_type' => [
                'required',
                'string',
                'max:255',
            ],

            'message' => [
                'nullable',
                'string',
                'max:5000',
            ],

            'launch_list' => [
                'nullable',
                'boolean',
            ],

            'consent' => [
                'accepted',
            ],

            'company_website' => [
                'nullable',
                'string',
                'max:255',
            ],

            'source' => [
                'nullable',
                'string',
                'max:100',
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
            'interest.required' => 'Please choose a collection.',
            'company_website.max' => 'The request could not be submitted.',
        ];
    }
}
