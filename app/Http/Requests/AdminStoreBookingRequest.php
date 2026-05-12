<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreBookingRequest extends FormRequest
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
            'car_id' => 'required|exists:cars,id',
            'customer_name' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|max:20',
            'start_date' => 'required|date',
            'duration_type' => 'required|integer|in:12,24',
            'extra_hours' => 'nullable|integer|min:0',
            'dp_amount' => 'nullable|numeric|min:0|required_if:transaction_mode,booking',
            'notes' => 'nullable|string',
        ];
    }
}
