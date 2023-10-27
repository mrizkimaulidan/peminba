<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BorrowingResource;
use App\Models\Borrowing;
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
            'data' => new BorrowingResource($borrowing),
        ]);
    }
}
