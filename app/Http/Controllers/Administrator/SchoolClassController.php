<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
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
    public function store(Request $request)
    {
        SchoolClass::create($request->all());

        return redirect()->route('administrators.school-classes.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolClass $schoolClass)
    {
        $schoolClass->update($request->all());

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
}
