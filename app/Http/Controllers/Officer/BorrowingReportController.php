<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BorrowingReportController extends Controller
{
    public function index(): View
    {
        $borrowings = [];

        if (request()->has('start_date') && request()->has('end_date')) {
            $startDate = request()->get('start_date');
            $endDate = request()->get('end_date');

            $borrowings = Borrowing::whereBetween('date', [$startDate, $endDate])->get();
        }

        return view('administrator.borrowing.report.index', compact('borrowings'));
    }
}
