<?php

namespace App\Http\Controllers\Administrator\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubjectController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $subject
        ]);
    }
}
