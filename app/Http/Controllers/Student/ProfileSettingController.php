<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class ProfileSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.profile_setting.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $student = Student::find(auth('student')->id());

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password ?? $student->password
        ]);

        return redirect()->route('students.profile-settings.index')->with('success', 'Data berhasil diubah!');
    }
}
