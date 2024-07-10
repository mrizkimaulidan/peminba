<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\ProgramStudy;
use App\Models\SchoolClass;
use App\Models\Student;

class BorrowingReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Borrowing::filter();

        $borrowings = $query->with('commodity:id,name', 'student:id,identification_number,name', 'officer:id,name')
            ->select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
            ->orderBy('date', 'DESC')
            ->get();

        $students = Student::select('id', 'identification_number', 'name')->orderBy('identification_number')->get();
        $programStudies = ProgramStudy::select('id', 'name')->orderBy('name')->get();
        $schoolClasses = SchoolClass::select('id', 'name')->orderBy('name')->get();

        return view(
            'administrator.borrowing.report.index',
            compact(
                'borrowings',
                'students',
                'programStudies',
                'schoolClasses'
            )
        );
    }
}
