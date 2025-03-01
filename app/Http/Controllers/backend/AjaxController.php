<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Retailer;
use App\Models\RetailerDues;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;





class AjaxController extends Controller
{
    public function retailerInfo(Request $request): JsonResponse
    {
        $id = $request->id;
        $data = Retailer::where('id', $id)->get();
        $dues = RetailerDues::where('retailer_id', $id)->get();

        return response()->json(['retailer' => $data, 'mydues' =>$dues]);
    }
}
