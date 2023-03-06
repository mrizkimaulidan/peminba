<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramStudy $programStudy)
    {
        $programStudy->update($request->all());

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
