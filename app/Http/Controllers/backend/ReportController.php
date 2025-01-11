<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Investment;
use App\Models\Payment;
use App\Models\Stock;

class ReportController extends Controller
{
    public function index()
    {
        $companies = DB::table('companies')->get();
        $businesses = DB::table('businesses')->get();
        return view('backend.reports.index', compact('companies', 'businesses'));
    }


    public function report1(Request $request)
    {
        $company = Company::find($request->company);
        $month = $request->month;
        $year = $request->year;
        $items = DB::table('sales_payments_stocks')
            ->join('points', 'points.id', '=', 'sales_payments_stocks.point_id')
            ->where('company_id', $company->id)
            ->whereMonth('start_date', $month)
            ->whereYear('start_date', $year)
            ->get();

        return view('backend.reports.report1', compact('items', 'company'));
    }

    public function report2(Request $request)
    {
        $business = Business::find($request->business);
        $month = $request->month;
        $year = $request->year;
        $investments = Investment::where('business_id', $request->business)->get();

        $payments = Payment::where('business_id', $request->business)
            ->whereMonth('payment_date', $month)
            ->whereYear('payment_date', $year)->get();

        $stocks = Stock::where('business_id', $request->business)
            ->whereMonth('received_date', $month)
            ->whereYear('received_date', $year)->get();


        $items = DB::table('opening_closing')
            ->join('points', 'points.id', '=', 'opening_closing.point_id')
            ->where('business_id', $business->id)
            ->where('month', $month)
            ->where('year', $year)
            ->get();

        // $payments = DB::table('payments')
        //     ->whereMonth('payment_date', $month)
        //     ->whereYear('payment_date', $year)
        //     ->get();

        return view('backend.reports.report2', compact('items', 'investments', 'payments', 'stocks'));
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
