<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAcquisitionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'organization' => 'nullable|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'budget_range' => 'required|string|max:255',
            'message' => 'required|string',
            // Honeypot field - must be empty
            'company_code' => 'present|max:0',
        ];
    }
    
    public function messages(): array
    {
        return [
            'company_code.max' => 'Spam detected.',
        ];
    }
}
