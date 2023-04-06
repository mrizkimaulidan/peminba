<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\Commodity;
use App\Models\Subject;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowings = Borrowing::whereDate('date', now())->where('student_id', auth()->id())->latest()->get();
        $commodities = Commodity::all();
        $subjects = Subject::all();

        if (request()->has('date')) {
            $borrowings = Borrowing::whereDate('date', request('date'))->where('student_id', auth()->id())->latest()->get();
        }

        return view('student.borrowing.main.index', compact('borrowings', 'commodities', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Borrowing::create([
            'commodity_id' => $request->commodity_id,
            'student_id' => auth('student')->id(),
            'subject_id' => $request->subject_id,
            'date' => $request->date,
            'time_start' => $request->time_start,
        ]);

        return redirect()->route('students.borrowings.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        $borrowing->update($request->all());

        return redirect()->route('students.borrowings.index')->with('success', 'Data berhasil diubah!');
    }

    public function returned(Borrowing $borrowing)
    {
        $borrowing->update([
            'time_end' => now(),
            'is_returned' => 1
        ]);

        return redirect()->back()->with('success', 'Status berhasil diubah!');
    }
}
