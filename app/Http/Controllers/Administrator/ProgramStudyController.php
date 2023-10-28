<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\StoreProgramStudyRequest;
use App\Http\Requests\Administrator\UpdateProgramStudyRequest;
use App\Http\Requests\ImportExcelRequest;
use App\Models\ProgramStudy;
use App\Services\ImportService;

class ProgramStudyController extends Controller
{
    private ImportService $importService;

    public function __construct()
    {
        $this->importService = new ImportService(new ProgramStudy());
    }

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

    /**
     * Import a listing of the resource.
     */
    public function import(ImportExcelRequest $request)
    {
        $counts = $this->importService->importExcel($request->validated('import'), ['name'], 'name', 0);
        $message = "Total {$counts['imported']} berhasil diimpor, {$counts['ignored']} dihiraukan!";

        return redirect()->route('administrators.program-studies.index')->with('success', $message);
    }
}
