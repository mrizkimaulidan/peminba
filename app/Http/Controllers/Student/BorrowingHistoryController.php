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
        $query = Borrowing::query()
            ->where('student_id', auth('student')->id())
            ->with('commodity:id,name', 'student:id,identification_number,name', 'officer:id,name')
            ->orderByDesc('date');

        $query->when($request->filled('date'), function ($q) use ($request) {
            return $q->whereDate('date', $request->date);
        });

        $query->when($request->filled('status'), function ($q) use ($request) {
            if ($request->status === '1') {
                return $q->whereNotNull('time_end');
            }

            return $q->whereNull('time_end');
        });

        $borrowings = $query
            ->select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
            ->get();

        return view('student.borrowing.history.index', compact('borrowings'));
    }
}
