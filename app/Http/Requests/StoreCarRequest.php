<?php



namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCarRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'plate_code' => [
                'required',
                Rule::unique('cars', 'plate_code')->ignore($this->route('car')),
            ],
            'color' => 'required',
            'category' => 'required',
            'transmission' => 'required',
            'price_12h' => 'required|numeric',
            'price_24h' => 'required|numeric',
            // Tambahkan jpeg di sini supaya lebih aman
            // Ganti baris image di rules() menjadi ini:
            'image' => 'nullable|image|max:10240',
        ];
    }

    /**
     * Custom validation error messages in Indonesian language
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama mobil wajib diisi',
            'plate_code.required' => 'Plat nomor kendaraan wajib diisi',
            'plate_code.unique' => 'Plat nomor ini sudah terdaftar di sistem',
            'color.required' => 'Warna mobil wajib diisi',
            'transmission.required' => 'Tipe transmisi wajib dipilih',
            'price_12h.required' => 'Harga sewa 12 jam wajib diisi',
            'price_12h.numeric' => 'Harga sewa 12 jam harus berupa angka',
            'price_24h.required' => 'Harga sewa 24 jam wajib diisi',
            'price_24h.numeric' => 'Harga sewa 24 jam harus berupa angka',
            'image.image' => 'File yang diupload harus berupa gambar',
            'image.mimes' => 'Format gambar hanya boleh JPG, JPEG, atau PNG',
            'image.max' => 'Ukuran gambar maksimal 10 MB',
        ];
    }
}