<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\StoreSchoolClassRequest;
use App\Http\Requests\Administrator\UpdateSchoolClassRequest;
use App\Http\Requests\ImportExcelRequest;
use App\Models\SchoolClass;
use App\Services\ImportService;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    private ImportService $importService;

    public function __construct()
    {
        $this->importService = new ImportService(new SchoolClass());
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolClasses = SchoolClass::select('id', 'name')->get();

        return view('administrator.school_class.index', compact('schoolClasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolClassRequest $request)
    {
        SchoolClass::create($request->validated());

        return redirect()->route('administrators.school-classes.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolClassRequest $request, SchoolClass $schoolClass)
    {
        $schoolClass->update($request->validated());

        return redirect()->route('administrators.school-classes.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolClass $schoolClass)
    {
        $schoolClass->delete();

        return redirect()->route('administrators.school-classes.index')->with('success', 'Data berhasil dihapus!');
    }

    /**
     * Import a listing of the resource.
     */
    public function import(ImportExcelRequest $request)
    {
        $counts = $this->importService->importExcel($request->validated('import'), ['name'], 'name', 0);
        $message = "Total {$counts['imported']} berhasil diimpor, {$counts['ignored']} dihiraukan!";

        return redirect()->route('administrators.school-classes.index')->with('success', $message);
    }
}
