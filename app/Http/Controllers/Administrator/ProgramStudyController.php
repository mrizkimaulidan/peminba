<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgramStudyRequest;
use App\Http\Requests\UpdateProgramStudyRequest;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;

class ProgramStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programStudies = ProgramStudy::select('id', 'name')->get();

        return view('administrator.program_study.index', compact('programStudies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramStudyRequest $request)
    {
        ProgramStudy::create($request->validated());

        return redirect()->route('administrators.program-studies.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramStudyRequest $request, ProgramStudy $programStudy)
    {
        $programStudy->update($request->validated());

        return redirect()->route('administrators.program-studies.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramStudy $programStudy)
    {
        $programStudy->delete();

        return redirect()->route('administrators.program-studies.index')->with('success', 'Data berhasil dihapus!');
    }
}
