<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BorrowingController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Borrowing $borrowing)
    {
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $borrowing->load('commodity', 'student', 'student.programStudy', 'student.schoolClass', 'subject')
        ]);
    }
}
