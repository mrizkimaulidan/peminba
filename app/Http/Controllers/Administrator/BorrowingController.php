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
            $borrowings = Borrowing::whereDate('date', request('date'))->get();
        }

        return view('administrator.borrowing.main.index', compact('borrowings'));
    }
}
