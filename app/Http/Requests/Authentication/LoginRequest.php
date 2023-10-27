<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|min:3|max:255',
            'password' => 'required|string|min:3|max:255',
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
            'email.required' => 'Kolom email wajib diisi!',
            'email.string' => 'Kolom email harus karakter!',
            'email.email' => 'Kolom email harus email yang valid!',
            'email.min' => 'Kolom email minimal :min karakter!',
            'email.max' => 'Kolom email maksimal :max diisi!',

            'password.required' => 'Kolom password wajib diisi!',
            'password.string' => 'Kolom password harus karakter!',
            'password.min' => 'Kolom password minimal :min karakter!',
            'password.max' => 'Kolom password maksimal :max diisi!',
        ];
    }
}
