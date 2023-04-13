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
        $borrowings = Borrowing::whereNotNull('time_end')->where('is_returned', 1)
            ->where('student_id', auth()->id())
            ->latest()->get();

        if (request()->has('date')) {
            $borrowings = Borrowing::whereNotNull('time_end')->whereDate('date', request('date'))
                ->where('is_returned', 1)->latest()->get();
        }

        return view('officer.borrowing.history.index', compact('borrowings'));
    }
}
