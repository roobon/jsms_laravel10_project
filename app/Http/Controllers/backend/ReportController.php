<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Payment;




class ReportController extends Controller
{
    public function index()
    {
        $companies = DB::table('companies')->get();
        return view('backend.reports.index', compact('companies'));
    }


    public function report1(Request $request)
    {
       $company = Company::find($request->company);
       $month = $request->month;
        $items = DB::table('sales_payments_stocks')
            ->join('points', 'points.id', '=', 'sales_payments_stocks.point_id')
            ->where('company_id', $company->id)
            ->whereMonth('start_date', $month)
            ->get();
        
        return view('backend.reports.report1', compact('items', 'company'));
    }

    public function report2(Request $request)
    {
       $company = Company::find($request->company);
       $month = $request->month;
       $year = "2025";
       $items = DB::table('sales_payments_stocks')
            ->join('points', 'points.id', '=', 'sales_payments_stocks.point_id')
            ->where('company_id', $company->id)
            ->whereMonth('start_date', $month)
            ->get();

        $payments = DB::table('payments')            
            ->whereMonth('payment_date', $month)
            ->whereYear('payment_date', $year)
            ->get();
        
        return view('backend.reports.report2', compact('items', 'company', 'payments'));
    }

    public function report3(Request $request)
    {
        $items = DB::table('sales_payments_stocks')
            ->join('points', 'points.id', '=', 'sales_payments_stocks.point_id')
            ->get();
        //return view('backend.reports.companyReport', compact('items'));
        return view('backend.reports.report2', compact('items'));
    }

    public function report4(Request $request)
    {
        $items = DB::table('sales_payments_stocks')
            ->join('points', 'points.id', '=', 'sales_payments_stocks.point_id')
            ->get();
        //return view('backend.reports.companyReport', compact('items'));
        return view('backend.reports.report3', compact('items'));
    }
}
