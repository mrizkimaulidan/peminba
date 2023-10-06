<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Borrowing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ChartController extends Controller
{
    private $months = ['jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agu', 'sep', 'okt', 'nov', 'des'];

    /**
     * Handle chart statistics request.
     *
     * @param Request $request
     *
     * @return void
     * @author Muhammad Rizki Maulidan <mrizkimaulidanx@gmail.com>
     */
    public function index(Request $request)
    {
        $query = Borrowing::query();

        $query->when($request->has('year'), function ($q) use ($request) {
            return $q->whereYear('date', $request->year);
        });

        $query->when($request->has('studentID'), function ($q) use ($request) {
            return $q->where('student_id', $request->studentID);
        });

        $results = $query->selectRaw('EXTRACT(MONTH FROM date) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        for ($i = 1; $i <= 12; $i++) {
            // if key exists so there is a borrowing count on that month
            // if key does not exists there is no borrowing on that month so the count
            // should be 0
            $statistics[$this->months[$i - 1]] = isset($results[$i]) ? $results[$i] : 0;
        }

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'ok',
            'data' => $statistics
        ], Response::HTTP_OK);
    }
}
