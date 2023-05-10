<?php

namespace App\Http\Requests\Officer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
{
    protected $errorBag = 'update';
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|string|min:3|max:255',
            'name' => 'required|string|min:3|max:255'
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
            'code.required' => 'Kolom kode wajib diisi!',
            'code.string' => 'Kolom kode wajib karakter!',
            'code.min' => 'Kolom kode minimal :min karakter!',
            'code.max' => 'Kolom kode maksimal :max karakter!',

            'name.required' => 'Kolom nama wajib diisi!',
            'name.string' => 'Kolom nama wajib karakter!',
            'name.min' => 'Kolom nama minimal :min karakter!',
            'name.max' => 'Kolom nama maksimal :max karakter!',
        ];
    }
}
