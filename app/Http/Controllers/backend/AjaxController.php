<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class AjaxController extends Controller
{
    public function retailerInfo(Request $request): JsonResponse
    {
        $data = $request->data;
        // $Data;
        return response()->json(['success' => $data]);
    }
}
