<?php

namespace App\Http\Controllers\Officer;

use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Officer\StoreStudentRequest;
use App\Http\Requests\Officer\UpdateStudentRequest;

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

        return view('officer.student.index', compact('students', 'programStudies', 'schoolClasses'));
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

        return redirect()->route('officers.students.index')->with('success', 'Data berhasil ditambahkan!');
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

        return redirect()->route('officers.students.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('officers.students.index')->with('success', 'Data berhasil dihapus!');
    }
}
