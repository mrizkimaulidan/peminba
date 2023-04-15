<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\ProgramStudy;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('programStudy', 'schoolClass')->select(
            'id',
            'program_study_id',
            'school_class_id',
            'identification_number',
            'name',
        )->get();

        $programStudies = ProgramStudy::select('id', 'name')->get();
        $schoolClasses = SchoolClass::select('id', 'name')->get();

        return view('administrator.student.index', compact('students', 'programStudies', 'schoolClasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Student::create($request->all());

        return redirect()->route('administrators.students.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->update([
            'program_study_id' => $request->program_study_id,
            'school_class_id' => $request->school_class_id,
            'identification_number' => $request->identification_number,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ?? $student->password,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('administrators.students.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('administrators.students.index')->with('success', 'Data berhasil dihapus!');
    }
}
