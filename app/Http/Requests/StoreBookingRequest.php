<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'customer_name' => ucwords(strtolower($this->customer_name)),
            'whatsapp_number' => preg_replace('/[^0-9+]/', '', $this->whatsapp_number),
        ]);
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
            'whatsapp_number' => ['required', 'string', 'regex:/^(\+62|62|0)[0-9]{9,12}$/'],
            'start_date' => 'required|date',
            'duration_type' => 'required|in:12,24',
            'extra_hours' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
            'terms' => 'accepted'
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
            'whatsapp_number.regex' => 'Format nomor WhatsApp tidak valid. Gunakan format seperti 0812xxxxxxx atau +62812xxxxxxx.',
            'start_date.required' => 'Tanggal mulai sewa wajib dipilih.',
            'start_date.date' => 'Format tanggal mulai tidak valid.',
            'duration_type.required' => 'Durasi sewa wajib dipilih.',
            'duration_type.in' => 'Durasi sewa harus 12 atau 24 jam.',
            'extra_hours.numeric' => 'Jam tambahan harus berupa angka.',
            'extra_hours.min' => 'Jam tambahan tidak boleh kurang dari 0.',
            'notes.string' => 'Catatan harus berupa teks.',
            'terms.accepted' => 'Anda harus menyetujui syarat & ketentuan.',
        ];
    }
}