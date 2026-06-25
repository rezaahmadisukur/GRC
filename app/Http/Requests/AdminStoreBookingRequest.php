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
            'car_id'          => ['required', 'exists:cars,id'],
            
            // Tambahan Regex: Hanya boleh huruf, spasi, titik, strip, dan petik
            'customer_name'   => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\.\-\']+$/'],
            
            // Tambahan Regex: Hanya boleh angka (dan opsional tanda + di depan)
            'whatsapp_number' => ['required', 'string', 'max:20', 'regex:/^\+?[0-9]+$/'],
            
            'start_date'      => ['required', 'date'],
            'duration_type'   => ['required', 'integer', 'in:12,24'],
            'extra_hours'     => ['nullable', 'integer', 'min:0'],
            'dp_amount'       => ['nullable', 'numeric', 'min:0', 'required_if:transaction_mode,booking'],
            'notes'           => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'car_id.required'          => 'Mobil harus dipilih.',
            'car_id.exists'            => 'Mobil yang dipilih tidak tersedia.',
            
            'customer_name.required'   => 'Nama pelanggan wajib diisi.',
            'customer_name.max'        => 'Nama pelanggan maksimal :max karakter.',
            'customer_name.regex'      => 'Nama pelanggan tidak boleh mengandung angka. Hanya boleh huruf, spasi, atau tanda baca valid.',
            
            'whatsapp_number.required' => 'Nomor HP wajib diisi.',
            'whatsapp_number.max'      => 'Nomor HP maksimal :max karakter.',
            'whatsapp_number.regex'    => 'Nomor HP tidak valid. Pastikan hanya memasukkan angka (boleh diawali tanda +).',
            
            'start_date.required'      => 'Tanggal mulai sewa wajib dipilih.',
            'start_date.date'          => 'Format tanggal mulai tidak valid.',
            
            'duration_type.required'   => 'Durasi sewa wajib dipilih.',
            'duration_type.in'         => 'Durasi sewa harus 12 atau 24 jam.',
            
            'extra_hours.integer'      => 'Jam tambahan harus berupa angka.',
            'extra_hours.min'          => 'Jam tambahan tidak boleh kurang dari 0.',
            
            'dp_amount.numeric'        => 'DP harus berupa angka.',
            'dp_amount.min'            => 'DP tidak boleh kurang dari 0.',
            
            'notes.string'             => 'Catatan harus berupa teks.',
        ];
    }
}