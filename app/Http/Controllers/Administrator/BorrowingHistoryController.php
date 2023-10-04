<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Contracts\View\View;

class BorrowingHistoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $query = Borrowing::query();

        $query->when(request()->has('date'), function ($q) {
            return $q->whereDate('date', request('date'));
        });

        $borrowings = $query->with('commodity:id,name', 'student:id,identification_number,name', 'officer:id,name')
            ->select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
            ->orderBy('date', 'DESC')
            ->get();

        return view('administrator.borrowing.history.index', compact('borrowings'));
    }
}
