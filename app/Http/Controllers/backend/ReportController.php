<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Investment;
use App\Models\Payment;
use App\Models\Sales;
use App\Models\Stock;
use App\Models\Target;

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
        $month = $request->month;
        $year = $request->year;
        $business = Business::find($request->business)->first();
        $target = Target::where('business_id', $request->business)
            ->whereMonth('start_date', $month)
            ->whereYear('start_date', $year)
            ->first();
        // ->whereMonth('investment_date', $month)
        // ->whereYear('investment_date', $year)
        // ->first();

        $investments = Investment::where('business_id', $request->business)
            ->whereMonth('investment_date', $month)
            ->whereYear('investment_date', $year)
            ->get();
        $totalInvestment = $investments->sum('investment_amount');

        $payments = Payment::where('business_id', $request->business)
            ->whereMonth('payment_date', $month)
            ->whereYear('payment_date', $year)
            ->get();
        $totalPayments = $payments->sum('payment_amount');

        $stocks = Stock::where('business_id', $request->business)
            ->whereMonth('received_date', $month)
            ->whereYear('received_date', $year)
            ->get();
        $stockamount = $stocks->sum('product_amount');

        $sales = Sales::where('business_id', $request->business)
            ->whereMonth('sales_date', $month)
            ->whereYear('sales_date', $year)
            ->get();
        $totalSales = $sales->sum('total_amount');
        $collections = $sales->sum('collection_amount');
        $dues = $sales->sum('due_amount');

        $opening = DB::table('opening_closing')
            ->where('business_id', $request->business)
            ->where('month', $month)
            ->where('year', $year)
            ->where('period', 'opening')
            ->first();

        $closing = DB::table('opening_closing')
            ->where('business_id', $request->business)
            ->where('month', $month)
            ->where('year', $year)
            ->where('period', 'closing')
            ->first();

        $data['opening'] = $opening;
        $data['closing'] = $closing;
        $data['investments'] =  $investments;
        $data['payments'] =  $payments;
        $data['business'] = $business;
        $data['stocks'] = $stocks;
        $data['totalInvestment'] =  $totalInvestment;
        $data['totalPayments'] =  $totalPayments;
        $data['target'] =  $target;
        $data['sales'] =  $sales;
        $data['totalsales'] =  $totalSales;
        $data['collections'] =  $collections;
        $data['dues'] =  $dues;
        $data['stockamount'] =  $stockamount;

        //return view('backend.reports.report2', compact('opening', 'closing',  'investments', 'totalInvestment', 'payments', 'totalPayments', 'stocks', 'business'));
        return view('backend.reports.report2', $data);
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
