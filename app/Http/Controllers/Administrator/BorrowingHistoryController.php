<?php

namespace App\Http\Controllers\Administrator;

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
            ->latest()->get();

        if (request()->has('date')) {
            $borrowings = Borrowing::whereNotNull('time_end')->whereDate('date', request('date'))
                ->where('is_returned', 1)->latest()->get();
        }

        return view('administrator.borrowing.history.index', compact('borrowings'));
    }
}
