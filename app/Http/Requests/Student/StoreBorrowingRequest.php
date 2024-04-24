<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreBorrowingRequest extends FormRequest
{
    protected $errorBag = 'store';

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'commodity_id' => 'required|min:1|exists:commodities,id',
            'time_start' => 'required|date_format:H:i',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'commodity_id.required' => 'Kolom komoditas wajib diisi!',
            'commodity_id.min' => 'Kolom komoditas tidak valid!',
            'commodity_id.exists' => 'Kolom komoditas tidak valid!',

            'time_start.required' => 'Kolom jam pinjam wajib diisi!',
            'time_start.date_format' => 'Kolom jam pinjam tidak valid!',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'student_id' => auth('student')->id(),
        ]);
    }
}
