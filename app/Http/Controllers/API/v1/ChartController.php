<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ChartController extends Controller
{
    private $months = ['jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agu', 'sep', 'okt', 'nov', 'des'];

    /**
     * Count borrowing each month by this current year.
     *
     * @return object
     */
    public function chartThisYear(): object
    {
        $borrowings = Borrowing::selectRaw('MONTH(date) as month, COUNT(*) as count')
            ->whereYear('date', now()->year)
            ->groupBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        for ($i = 1; $i <= 12; $i++) {
            // if key exists so there is a borrowing count on that month
            // if key does not exists there is no borrowing on that month so the count
            // should be 0
            $results[$this->months[$i - 1]] = isset($borrowings[$i]) ? $borrowings[$i] : 0;
        }

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'ok',
            'data' => $results
        ], Response::HTTP_OK);
    }

    /**
     * Count borrowing each month by this current year based on student_id provided
     * in parameter.
     *
     * @param Request $request
     * @return object
     */
    public function chartByStudentID(Request $request): object
    {
        $borrowings = Borrowing::selectRaw('MONTH(date) as month, COUNT(*) as count')
            ->where('student_id', $request->student_id)
            ->whereYear('date', now()->year)
            ->groupBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        for ($i = 1; $i <= 12; $i++) {
            // if key exists so there is a borrowing count on that month
            // if key does not exists there is no borrowing on that month so the count
            // should be 0
            $results[$this->months[$i - 1]] = isset($borrowings[$i]) ? $borrowings[$i] : 0;
        }

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'ok',
            'data' => $results
        ], Response::HTTP_OK);
    }
}
