<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingStatusRequest extends FormRequest
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
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'dp_amount' => 'nullable|numeric|min:0',
            'penalty_amount' => 'nullable|numeric|min:0',
            'return_notes' => 'nullable|string'
        ];
    }

    public function messages(): array
    {
        return [
            'status.in' => 'Status yang dipilih tidak valid'
        ];

    }
}
