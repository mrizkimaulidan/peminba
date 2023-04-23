<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChartController extends Controller
{
    public function chartThisYear(): object
    {
        $months = ['jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agu', 'sep', 'okt', 'nov', 'des'];

        for ($i = 1; $i <= 12; $i++) {
            $borrowings = Borrowing::whereMonth('date', "{$i}")
                ->whereYear('date', now()->year)
                ->count();

            $results[$months[$i - 1]] = $borrowings;
        }

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'ok',
            'data' => $results
        ], Response::HTTP_OK);
    }

    public function chartByStudentID(Request $request): object
    {
        $months = ['jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agu', 'sep', 'okt', 'nov', 'des'];

        for ($i = 1; $i <= 12; $i++) {
            $borrowings = Borrowing::whereMonth('date', "{$i}")
                ->where('student_id', $request->student_id)
                ->whereYear('date', now()->year)
                ->count();

            $results[$months[$i - 1]] = $borrowings;
        }

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'ok',
            'data' => $results
        ], Response::HTTP_OK);
    }
}
