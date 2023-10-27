<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\UpdateProfileSettingRequest;
use App\Models\Student;

class ProfileSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myInformation = auth('student')->user();

        return view('student.profile_setting.index', compact('myInformation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileSettingRequest $request)
    {
        $student = Student::find(auth('student')->id());
        $validated = $request->validated();

        $student->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'password' => ! is_null($validated['password']) ? bcrypt($validated['password']) : $student->password,
        ]);

        return redirect()->route('students.profile-settings.index')->with('success', 'Data berhasil diubah!');
    }
}
