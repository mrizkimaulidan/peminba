<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $counts = Borrowing::where('student_id', auth('student')->user()->id)->count();
        $returned = Borrowing::where('student_id', auth('student')->user()->id)->where('is_returned', 1)->count();
        $notReturned = Borrowing::where('student_id', auth('student')->user()->id)->where('is_returned', 0)->count();

        $myBorrowings = [
            'counts' => $counts,
            'returned' => $returned,
            'notReturned' => $notReturned
        ];

        return view('student.dashboard', compact('myBorrowings'));
    }
}
