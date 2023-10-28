<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\StoreSubjectRequest;
use App\Http\Requests\Administrator\UpdateSubjectRequest;
use App\Http\Requests\ImportExcelRequest;
use App\Models\Subject;
use App\Services\ImportService;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    private ImportService $importService;

    public function __construct()
    {
        $this->importService = new ImportService(new Subject());
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::select('id', 'code', 'name')->get();

        return view('administrator.subject.index', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        Subject::create($request->validated());

        return redirect()->route('administrators.subjects.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->validated());

        return redirect()->route('administrators.subjects.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('administrators.subjects.index')->with('success', 'Data berhasil dihapus!');
    }

    /**
     * Import a listing of the resource.
     */
    public function import(ImportExcelRequest $request)
    {
        $counts = $this->importService->importExcel($request->validated('import'), ['code', 'name'], 'code', 0);
        $message = "Total {$counts['imported']} berhasil diimpor, {$counts['ignored']} dihiraukan!";

        return redirect()->route('administrators.subjects.index')->with('success', $message);
    }
}
