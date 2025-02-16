<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Deposit;
use App\Models\Investment;
use App\Models\Payment;
use App\Models\RetailerDues;
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

        // Investments Data
        $investments = Investment::where('business_id', $request->business)
            ->whereMonth('investment_date', $month)
            ->whereYear('investment_date', $year)
            ->get();
        $totalInvestment = $investments->sum('investment_amount');

        

       
        // Sales Data
        $sales = Sales::where('business_id', $request->business)
            ->whereMonth('sales_date', $month)
            ->whereYear('sales_date', $year)
            ->get();
        $totalSales = $sales->sum('total_amount');
        $collections = $sales->sum('collection_amount');
        $dues = $sales->sum('due_amount');

        // Companies where deposits
        $deposittoCompanies = Deposit::where('business_id', $request->business)
            ->whereMonth('deposit_date', $month)
            ->whereYear('deposit_date', $year)
            ->groupBy('company_id')
            ->get();
        
        // Without group by for total records
        $deposCompanies = Deposit::where('business_id', $request->business)
        ->whereMonth('deposit_date', $month)
        ->whereYear('deposit_date', $year)
        ->get();
        $totalCompanydeposits = $deposCompanies->sum('deposit_amount');

        // For passing data to blade page for subquery
        $businessInfo = ['id' => $request->business, 
                    'month' => $month, 
                    'year' => $year ];

        // Product Received

        // Companies where from product received
        $productReceivedCompanies = Stock::where('business_id', $request->business)
            ->whereMonth('received_date', $month)
            ->whereYear('received_date', $year)
            ->groupBy('company_id')
            ->get();

         // SQUARE stocks
        //  $stocks = Stock::where('business_id', $request->business)
        //  ->whereMonth('received_date', $month)
        //  ->whereYear('received_date', $year)
        //  ->where('company_id', 1)
        //  ->get();

        $regular = Stock::where('business_id', $request->business)
         ->whereMonth('received_date', $month)
         ->whereYear('received_date', $year)
         ->where('product_type', 'regular')
         ->get();

     $resularamount = $regular->sum('product_amount');

     // Slab Stock
     $slbstocks = Stock::where('business_id', $request->business)
         ->whereMonth('received_date', $month)
         ->whereYear('received_date', $year)
         ->where('product_type', 'slab')
         ->get();
     $slbstockamount = $slbstocks->sum('product_amount');

     // VAT Adjustment
     $vatadjust = Stock::where('business_id', $request->business)
         ->whereMonth('received_date', $month)
         ->whereYear('received_date', $year)
         ->where('product_type', 'vatadjust')
         ->get();
     $vatadjustamount = $vatadjust->sum('product_amount');

     // Marketing Promotion Amount
     $mktpromo = Stock::where('business_id', $request->business)
         ->whereMonth('received_date', $month)
         ->whereYear('received_date', $year)
         ->where('product_type', 'mktpromo')
         ->get();
     $mktpromoamount = $mktpromo->sum('product_amount');



        $Retailerdues = RetailerDues::where('business_id', $request->business)
        ->whereMonth('sales_date', $month)
        ->whereYear('sales_date', $year)
        ->get();
        $totalRetailerDues = $Retailerdues->sum('due_amount');

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
        // $data['squaredatas'] =  $squaredatas;
        $data['business'] = $business;
        // $data['stocks'] = $stocks;
        $data['totalInvestment'] =  $totalInvestment;
        // $data['squarepayments'] =  $squarepayments;
        // $data['kamaldatas'] =  $kamaldatas;
        // $data['kamalpayments'] =  $kamalpayments;
        $data['target'] =  $target;
        $data['sales'] =  $sales;
        $data['totalsales'] =  $totalSales;
        $data['collections'] =  $collections;
        $data['dues'] =  $dues;
        $data['resularamount'] =  $resularamount;
       // $data['deposits'] =  $deposits;
        //$data['totaldeposits'] =  $totaldeposits;
        $data['slbstocks'] =  $slbstocks;
        $data['slbstockamount'] =  $slbstockamount;
        $data['vatadjustamount'] =  $vatadjustamount;
        $data['mktpromoamount'] =  $mktpromoamount;
        $data['Retailerdues'] =  $Retailerdues;
        $data['totalRetailerDues'] =  $totalRetailerDues;
        // Deposit to Company
        $data['deposittoCompanies'] =  $deposittoCompanies;
        $data['businessInfo'] =  $businessInfo;
        $data['totalCompanydeposits'] =  $totalCompanydeposits;

        // Product Received
        $data['productReceivedCompanies'] =  $productReceivedCompanies;

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
