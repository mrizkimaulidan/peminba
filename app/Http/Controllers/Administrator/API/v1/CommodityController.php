<?php

namespace App\Http\Controllers\Administrator\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Commodity;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommodityController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Commodity $commodity)
    {
        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $commodity
        ]);
    }
}
