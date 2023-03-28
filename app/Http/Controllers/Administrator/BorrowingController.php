<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BorrowingController extends Controller
{
    public function index(): View
    {
        $borrowings = Borrowing::whereDate('date', now())->get();

        if (request()->has('date')) {
            // Date from frontend is d-m-Y format
            // so format it into Y-m-d
            $formattedDate = now()->createFromDate(request()->get('date'));
            $borrowings = Borrowing::whereDate('date', $formattedDate)->get();
        }

        return view('administrator.borrowing.main.index', compact('borrowings'));
    }
}
