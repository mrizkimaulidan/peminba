<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Contracts\View\View;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $borrowings = Borrowing::with('student:id,identification_number,name', 'commodity:id,name', 'officer:id,name')
            ->select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
            ->whereDate('date', now())
            ->orderBy('date', 'DESC')
            ->get();

        return view('administrator.borrowing.main.index', compact('borrowings'));
    }
}
