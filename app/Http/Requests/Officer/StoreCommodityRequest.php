<?php

namespace App\Http\Requests\Officer;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommodityRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
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
            'name.required' => 'Kolom nama komoditas wajib diisi!',
            'name.string' => 'Kolom nama komoditas wajib karakter!',
            'name.min' => 'Kolom nama komoditas minimal :min karakter!',
            'name.max' => 'Kolom nama komoditas maksimal :max karakter!',
        ];
    }
}
