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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $carId = $this->route('car') ? $this->route('car')->id : null;

        return [
            'name' => 'required|string',
            'plate_code' => [
                'required',
                Rule::unique('cars', 'plate_code')->ignore($this->route('car')),
            ],
            'color' => 'required',
            'transmission' => 'required',
            'price_12h' => 'required|numeric',
            'price_24h' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
        ];
    }
}
