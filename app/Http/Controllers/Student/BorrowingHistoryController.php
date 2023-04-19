<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingHistoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $borrowings = Borrowing::with('student', 'commodity')
            ->select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
            ->where('student_id', auth()->id())
            ->latest()->get();

        if (request()->has('date')) {
            $borrowings = Borrowing::with('student', 'commodity')
                ->select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
                ->where('is_returned', 1)->latest()->get();
        }

        return view('student.borrowing.history.index', compact('borrowings'));
    }
}
