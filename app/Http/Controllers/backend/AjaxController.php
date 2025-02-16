<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Retailer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;





class AjaxController extends Controller
{
    public function retailerInfo(Request $request): JsonResponse
    {
        $id = $request->id;
        $data = Retailer::where('retailers.id', $id)->get();
        
        // DB::table('retailers')
        //     ->select('retailers.*', 'current_due')
        //     ->where('retailers.id', $id)->first();


            // $data = DB::table('retailers')
            // ->join('retailer_dues', 'retailers.id', '=', 'retailer_dues.retailer_id')
            // ->join('employees', 'retailers.employee_id', '=', 'employees.id')
            // ->select('retailers.*', 'retailer_dues.current_due', 'employees.name')
            // ->where('retailers.id', $id)->first();


        //find($id);

        /* DB::table('users')
        ->join('contacts', 'users.id', '=', 'contacts.user_id')
        ->join('orders', 'users.id', '=', 'orders.user_id')
        ->select('users.*', 'contacts.phone', 'orders.price')
        ->get();
        */

        return response()->json(['retailer' => $data]);
    }
}
