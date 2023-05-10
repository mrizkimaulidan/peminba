<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\StoreStudentRequest;
use App\Http\Requests\Administrator\UpdateStudentRequest;
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
        $students = Student::with('programStudy:id,name', 'schoolClass:id,name')->select(
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
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();

        Student::create([
            'program_study_id' => $validated['program_study_id'],
            'school_class_id' => $validated['school_class_id'],
            'identification_number' => $validated['identification_number'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone_number' => $validated['phone_number'],
        ]);

        return redirect()->route('administrators.students.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validated = $request->validated();

        $student->update([
            'program_study_id' => $validated['program_study_id'],
            'school_class_id' => $validated['school_class_id'],
            'identification_number' => $validated['identification_number'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => !is_null($validated['password']) ? bcrypt($validated['password']) : $student->password,
            'phone_number' => $validated['phone_number'],
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
