<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\Commodity;
use App\Models\Officer;
use App\Models\Student;
use Illuminate\Http\Request;

class BorrowingHistoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $query = Borrowing::query();

        $query->when(request()->filled('date'), function ($q) {
            return $q->whereDate('date', request('date'));
        });

        $query->when(request()->filled('status'), function ($q) {
            if (request('status') === '1') {
                return $q->whereNotNull('time_end');
            }

            return $q->whereNull('time_end');
        });

        $query->when(request()->filled('student_id'), function ($q) {
            return $q->where('student_id', request('student_id'));
        });

        $query->when(request()->filled('validate'), function ($q) {
            if (request('validate') === '1') {
                return $q->whereNotNull('officer_id');
            }

            return $q->whereNull('officer_id');
        });

        $query->when(request()->filled('commodity_id'), function ($q) {
            return $q->where('commodity_id', request('commodity_id'));
        });

        $borrowings = $query->with('commodity:id,name', 'student:id,identification_number,name', 'officer:id,name')
            ->select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
            ->orderBy('date', 'DESC')
            ->get();

        $students = Student::select('id', 'identification_number', 'name')->orderBy('identification_number')->get();
        $officers = Officer::select('id', 'name')->orderBy('name')->get();
        $commodities = Commodity::select('id', 'name')->orderBy('name')->get();

        return view('officer.borrowing.history.index', compact('borrowings', 'students', 'officers', 'commodities'));
    }
}
