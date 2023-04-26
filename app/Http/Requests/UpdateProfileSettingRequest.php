<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileSettingRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:administrators,email,' . $this->user('administrator')->id . '|min:3|max:255',
            'password' => 'nullable|confirmed|min:3|max:255',
            'phone_number' => 'required|numeric|unique:administrators,phone_number,' . $this->user('administrator')->id . '|digits_between:3,255'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.

     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Kolom nama wajib diisi!',
            'name.string' => 'Kolom nama harus berupa karakter!',
            'name.min' => 'Kolom nama minimal :min karakter!',
            'name.max' => 'Kolom nama maksimal :max karakter!',

            'email.required' => 'Kolom email wajib diisi!',
            'email.email' => 'Kolom email wajib email yang valid!',
            'email.unique' => 'Email sudah terdaftar!',
            'email.min' => 'Kolom email minimal :min karakter!',
            'email.max' => 'Kolom email maksimal :max karakter!',

            'password.required' => 'Kolom password wajib diisi!',
            'password.confirmed' => 'Kolom konfirmasi password tidak sesuai!',
            'password.min' => 'Kolom password minimal :min karakter!',
            'password.max' => 'Kolom password maksimal :max karakter!',

            'phone_number.required' => 'Kolom nomor handphone wajib diisi!',
            'phone_number.numeric' => 'Kolom nomor handphone harus berupa angka!',
            'phone_number.unique' => 'Nomor handphone sudah terdaftar!',
            'phone_number.digits_between' => 'Kolom nomor handphone minimal :min karakter dan maksimal :max karakter!',
        ];
    }
}
