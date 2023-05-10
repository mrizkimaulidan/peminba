<?php

namespace App\Http\Requests\Officer;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'program_study_id' => 'required|min:1|exists:program_studies,id',
            'school_class_id' => 'required|min:1|exists:school_classes,id',
            'identification_number' => 'required|numeric|unique:students,identification_number|digits_between:3,255',
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:students,email|min:3|max:255',
            'password' => 'required|confirmed|min:3|max:255',
            'phone_number' => 'required|numeric|unique:students,phone_number|digits_between:3,255'
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
            'program_study_id.required' => 'Kolom program studi wajib diisi!',
            'program_study_id.min' => 'Kolom program studi tidak valid!',
            'program_study_id.exists' => 'Kolom program studi tidak valid!',

            'school_class_id.required' => 'Kolom kelas wajib diisi!',
            'school_class_id.min' => 'Kolom kelas tidak valid!',
            'school_class_id.exists' => 'Kolom kelas tidak valid!',

            'identification_number.required' => 'Kolom NIM wajib diisi!',
            'identification_number.numeric' => 'Kolom NIM harus berupa angka!',
            'identification_number.unique' => 'NIM sudah terdaftar!',
            'identification_number.digits_between' => 'Kolom NIM minimal :min karakter dan maksimal :max karakter!',

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
