<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role === 'owner';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username',
            // 'password' => 'required|min:6|confirmed'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap harus diisi',
            'name.string' => 'Nama lengkap harus berupa teks',
            'name.max' => 'Nama lengkap maksimal 255 karakter',

            'username.required' => 'Username harus diisi',
            'username.string' => 'Username harus berupa teks',
            'username.unique' => 'Username sudah terdaftar, silakan gunakan username lain',

            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal harus 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok dengan password'
        ];
    }
}