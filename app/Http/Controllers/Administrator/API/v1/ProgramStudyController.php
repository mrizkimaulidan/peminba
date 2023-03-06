<?php

namespace App\Http\Controllers\Administrator\API\v1;

use App\Http\Controllers\Controller;
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
            'data' => $programStudy
        ]);
    }
}
