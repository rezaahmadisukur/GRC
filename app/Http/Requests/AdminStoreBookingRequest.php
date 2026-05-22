<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Override;

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

    public function messages(): array
    {
        return [
            'car_id.required' => 'Mobil harus dipilih.',
            'car_id.exists' => 'Mobil yang dipilih tidak tersedia.',
            'customer_name.required' => 'Nama lengkap wajib diisi.',
            'customer_name.max' => 'Nama lengkap maksimal :max karakter.',
            'whatsapp_number.required' => 'Nomor WhatsApp wajib diisi.',
            'whatsapp_number.max' => 'Nomor WhatsApp maksimal :max karakter.',
            'start_date.required' => 'Tanggal mulai sewa wajib dipilih.',
            'start_date.date' => 'Format tanggal mulai tidak valid.',
            'duration_type.required' => 'Durasi sewa wajib dipilih.',
            'duration_type.in' => 'Durasi sewa harus 12 atau 24 jam.',
            'extra_hours.integer' => 'Jam tambahan harus berupa angka.',
            'extra_hours.min' => 'Jam tambahan tidak boleh kurang dari 0.',
            'dp_amount.numeric' => 'DP harus berupa angka.',
            'dp_amount.min' => 'DP tidak boleh kurang dari 0.',
            'notes.string' => 'Catatan harus berupa teks.',
        ];
    }

}
