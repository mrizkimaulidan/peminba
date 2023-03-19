<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BorrowingReportController extends Controller
{
    public function index(Request $request): View
    {
        return view('administrator.borrowing.report.index');
    }
}
