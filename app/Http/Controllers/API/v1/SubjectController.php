<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
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
            'data' => new SubjectResource($subject),
        ]);
    }
}
