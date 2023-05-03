<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\Commodity;
use App\Models\Student;
use App\Repositories\BorrowingRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private BorrowingRepository $repository
    ) {
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $counts = [
            'student' => Student::select('id')->count(),
            'administrator' => Administrator::select('id')->count(),
            'commodity' => Commodity::select('id')->count()
        ];

        $latestRegisteredStudents = Student::select('name', 'email')->latest()->take(3)->get();
        $borrowingsNotReturned = $this->repository->getCommoditiesNotReturnedByStudent();

        return view('administrator.dashboard', compact('counts', 'latestRegisteredStudents', 'borrowingsNotReturned'));
    }
}
