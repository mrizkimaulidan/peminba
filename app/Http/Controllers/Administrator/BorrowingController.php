<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\Commodity;
use App\Models\Officer;
use App\Models\Student;
use Illuminate\Contracts\View\View;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = Borrowing::filter();

        $borrowings = $query->with('student:id,identification_number,name', 'commodity:id,name', 'officer:id,name')
            ->select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
            ->whereDate('date', now())
            ->orderBy('date', 'DESC')
            ->get();

        $students = Student::select('id', 'identification_number', 'name')->orderBy('identification_number')->get();
        $officers = Officer::select('id', 'name')->orderBy('name')->get();
        $commodities = Commodity::select('id', 'name')->orderBy('name')->get();

        return view('administrator.borrowing.main.index', compact('borrowings', 'students', 'officers', 'commodities'));
    }
}
