<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProgramStudyResource;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgramStudyController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(ProgramStudy $programStudy)
    {
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => new ProgramStudyResource($programStudy)
        ]);
    }
}
