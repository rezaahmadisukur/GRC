<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class DownloadReportRequest extends FormRequest
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
            'start_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
                'before_or_equal:end_date'
            ],
            'end_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
                'after_or_equal:start_date',
                'before_or_equal:today'
            ]
        ];
    }

    /**
     * Pesan error kustom dalam bahasa Indonesia
     */
    public function messages(): array
    {
        return [
            'start_date.required' => 'Tanggal awal harus diisi',
            'start_date.date' => 'Tanggal awal tidak valid',
            'start_date.before_or_equal' => 'Tanggal awal tidak boleh lebih besar dari tanggal akhir',

            'end_date.required' => 'Tanggal akhir harus diisi',
            'end_date.date' => 'Tanggal akhir tidak valid',
            'end_date.after_or_equal' => 'Tanggal akhir tidak boleh lebih kecil dari tanggal awal',
            'end_date.before_or_equal' => 'Tanggal akhir tidak boleh melebihi hari ini',
        ];
    }

    /**
     * Validasi lanjutan setelah rules dasar selesai
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {
            // Cek maksimal periode laporan 1 tahun
            if ($this->filled('start_date') && $this->filled('end_date')) {
                $diff = now()->parse($this->end_date)->diffInDays($this->start_date);

                if ($diff > 365) {
                    $validator->errors()->add('end_date', 'Periode laporan maksimal 1 tahun');
                }
            }
        });
    }
}
