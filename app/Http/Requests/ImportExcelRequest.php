<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportExcelRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'import' => 'required|file|mimes:xls,xlsx'
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
            'import.required' => 'Kolom file wajib diisi!',
            'import.file' => 'Kolom file harus berisi file yang valid!',
            'import.mimes' => 'Ekstensi yang dibolehkan hanya (.xls dan .xlsx)!',
        ];
    }
}
