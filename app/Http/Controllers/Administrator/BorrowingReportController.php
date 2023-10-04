<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;

class BorrowingReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Borrowing::query();

        $query->when(request()->has('start_date') && request()->has('end_date'), function ($q) {
            return $q->whereBetween('date', [request('start_date'), request('end_date')]);
        });

        $borrowings = $query->with('commodity:id,name', 'student:id,identification_number,name', 'officer:id,name')
            ->select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
            ->orderBy('date')
            ->get();

        return view('administrator.borrowing.report.index', compact('borrowings'));
    }
}
