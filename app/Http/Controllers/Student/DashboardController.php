<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
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
        $studentID = auth('student')->user()->id;

        $counts = $this->repository->countTotalBorrowingByStudentID($studentID);
        $returned = $this->repository->countStudentBorrowingReturnedStatus($studentID, true);
        $notReturned = $this->repository->countStudentBorrowingReturnedStatus($studentID, false);

        $myBorrowings = [
            'counts' => [
                'total' => $counts,
                'returned' => $returned,
                'notReturned' => $notReturned,
            ],
        ];

        return view('student.dashboard', compact('myBorrowings'));
    }
}
