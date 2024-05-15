<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\ProgramStudy;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\View\View;

class BorrowingReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = Borrowing::query();

        $query->when(request()->filled('student_id'), function ($q) {
            return $q->where('student_id', request('student_id'));
        });

        $query->when(request()->filled('program_study_id'), function ($q) {
            return $q->whereHas('student', function ($query) {
                $query->where('program_study_id', request('program_study_id'));
            });
        });

        $query->when(request()->filled('school_class_id'), function ($q) {
            return $q->whereHas('student', function ($query) {
                $query->whereHas('programStudy', function ($query) {
                    $query->where('school_class_id', request('school_class_id'));
                });
            });
        });

        $query->when(request()->filled('start_date') && request()->filled('end_date'), function ($q) {
            return $q->whereBetween('date', [request('start_date'), request('end_date')]);
        });

        $borrowings = $query->with('commodity:id,name', 'student:id,identification_number,name', 'officer:id,name')
            ->select('id', 'commodity_id', 'student_id', 'officer_id', 'date', 'time_start', 'time_end')
            ->orderBy('date', 'DESC')
            ->get();

        $students = Student::select('id', 'identification_number', 'name')->orderBy('identification_number')->get();
        $programStudies = ProgramStudy::select('id', 'name')->orderBy('name')->get();
        $schoolClasses = SchoolClass::select('id', 'name')->orderBy('name')->get();

        return view(
            'officer.borrowing.report.index',
            compact(
                'borrowings',
                'students',
                'programStudies',
                'schoolClasses'
            )
        );
    }
}
