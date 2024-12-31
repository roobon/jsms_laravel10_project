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
        //return view('backend.reports.companyReport', compact('items'));
        return view('backend.reports.companyReportBN', compact('items'));
        //return view('backend.reports.index');
    }

    public function create()
    {
        $items = DB::table('sales_payments_stocks')
            ->join('points', 'points.id', '=', 'sales_payments_stocks.point_id')
            ->get();
        //return view('backend.reports.companyReport', compact('items'));
        return view('backend.reports.companyReportBN', compact('items'));
    }
}
