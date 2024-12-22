<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ReportController extends Controller
{
    public function index()
    {
        $items = DB::table('sales_payments_stocks')
            ->join('points', 'points.id', '=', 'sales_payments_stocks.point_id')
            ->get();
        return view('backend.reports.companyReportBN', compact('items'));
    }

    // public function create()
    // {

    //     return view('backend.reports.centerReport');
    // }
}

// $users = DB::table('users')
// ->join('contacts', 'users.id', '=', 'contacts.user_id')
// ->join('orders', 'users.id', '=', 'orders.user_id')
// ->select('users.*', 'contacts.phone', 'orders.price')
// ->get();