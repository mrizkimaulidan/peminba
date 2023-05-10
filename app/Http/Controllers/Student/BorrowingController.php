<?php

namespace App\Http\Controllers\Student;

use App\Models\Subject;
use App\Models\Borrowing;
use App\Models\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreBorrowingRequest;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowings = Borrowing::with(['student:id,identification_number,name'], ['commodity:id,name'], ['officer:id,name'])
            ->select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
            ->whereDate('date', now())->where('student_id', auth()->id())
            ->latest()
            ->get();

        $commodityProgress = Borrowing::select('commodity_id', 'date', 'is_returned')
            ->whereDate('date', now())->where('is_returned', 0)
            ->latest()
            ->get();

        $subjects = Subject::select('id', 'name')->get();

        $commoditiesCanBorrowed = Commodity::select('id', 'name')->whereNotIn('id', $commodityProgress->pluck('commodity_id'))->get();
        $commoditiesCannotBeBorrowed = Commodity::select('id', 'name')->whereIn('id', $commodityProgress->pluck('commodity_id'))->get();

        return view('student.borrowing.main.index', compact('borrowings', 'commoditiesCanBorrowed', 'commoditiesCannotBeBorrowed', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBorrowingRequest $request)
    {
        $validated = $request->safe()->merge(['student_id' => auth('student')->id()]);
        Borrowing::create($validated->toArray());

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
