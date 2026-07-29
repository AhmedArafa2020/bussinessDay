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

            'phone' => [
                'required',
                'string',
                'max:50',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'interest' => [
                'required',
                'string',
                'max:255',
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

            'source' => [
                'required',
                'in:homepage,campaign-short',
            ],

//            'company_website' => [
//                'nullable',
//                'string',
//                'max:0',
//            ],
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
