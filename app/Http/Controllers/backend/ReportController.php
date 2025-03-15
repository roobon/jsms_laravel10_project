<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Deposit;
use App\Models\Investment;
use App\Models\Insentive;
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
        $businesses = Business::where('company_id', $request->company)->get();
        //dd($businesses);
        $month = $request->month;
        $year = $request->year;
        $items = DB::table('opening_closing')
            ->whereMonth('month', $month)
            ->whereYear('year', $year)
            ->get();

        return view('backend.reports.report1', compact('items', 'company', 'businesses'));
    }

    public function report2(Request $request)
    {
        // Month and Year
        $month = $request->month;
        $year = $request->year;
        // Find Business
        $business = Business::find($request->business)->first();

        // Find Target
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

        
        // Payments Data
        $paidtoCompanies = Payment::where('business_id', $request->business)
            ->whereMonth('payment_date', $month)
            ->whereYear('payment_date', $year)
            ->groupBy('company_id')
            ->get();
        
        // Payments Data Without group by for total records
        $paidCompanies = Payment::where('business_id', $request->business)
        ->whereMonth('payment_date', $month)
        ->whereYear('payment_date', $year)
        ->get();
        $totalCompanyPaids = $paidCompanies->sum('payment_amount');

        // For passing data to blade page for subquery
        $businessInfo = ['id' => $request->business, 
                    'month' => $month, 
                    'year' => $year ];


        // Product Received
        $productReceivedCompanies = Stock::where('business_id', $request->business)
            ->whereMonth('received_date', $month)
            ->whereYear('received_date', $year)
            ->groupBy('company_id')
            ->get();

        // Normal Stock
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

        // VAT Adjustment Stock
        $vatadjust = Stock::where('business_id', $request->business)
            ->whereMonth('received_date', $month)
            ->whereYear('received_date', $year)
            ->where('product_type', 'vatadjust')
            ->get();
        $vatadjustamount = $vatadjust->sum('product_amount');

        // Marketing Promotion Stock
        $mktpromo = Stock::where('business_id', $request->business)
            ->whereMonth('received_date', $month)
            ->whereYear('received_date', $year)
            ->where('product_type', 'mktpromo')
            ->get();
        $mktpromoamount = $mktpromo->sum('product_amount');

    // Insentive Received 
    $insentiveAmounts = Insentive::where('business_id', $request->business)
      ->whereMonth('received_date', $month)
      ->whereYear('received_date', $year)
      ->groupBy('company_id')
      ->get();
    $totalInsentiveAmount = $insentiveAmounts->sum('insentive_amount'); 

    // Sales Data
    $sales = Sales::where('business_id', $request->business)
        ->whereMonth('sales_date', $month)
        ->whereYear('sales_date', $year)
        ->get();
        $totalSales = $sales->sum('total_amount');
        $collections = $sales->sum('collection_amount');
        $dues = $sales->sum('due_amount');  
    
    // Collection and Dues    
    // $CollectionDues = Collection::select('invoice_no', SUM('collection_amount'), )->where('business_id', $request->business)
    //    ->whereMonth('invoice_date', $month)
    //    ->whereYear('invoice_date', $year)
    //    ->groupBy('invoice_no')
    //    ->get(); 

       $CollectionDues = DB::table('collections')
    ->join('retailers', 'collections.retailer_id', '=', 'retailers.id')
    ->select('invoice_date', 'retailers.current_due',DB::raw('SUM(collection_amount) as total') )
    ->where('business_id', $request->business)
    ->whereMonth('invoice_date', $month)
    ->whereYear('invoice_date', $year)
    ->groupBy('invoice_date')	
    ->get();
    $totalRetailerCollection = $CollectionDues->sum('total');
    $totalRetailerDues = $CollectionDues->sum('current_due');

    // Deposits to Head Offcie
    $AlldepositsHO = Deposit::where('business_id', $request->business)
    ->whereMonth('deposit_date', $month)
    ->whereYear('deposit_date', $year)
    ->get();
    $totalDepositHO = $AlldepositsHO->sum('deposit_amount');




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
        // Deposit to Head Office
        $data['AlldepositsHO'] =  $AlldepositsHO;
        $data['totalDepositHO'] =  $totalDepositHO;
        
        $data['slbstocks'] =  $slbstocks;
        $data['slbstockamount'] =  $slbstockamount;
        $data['vatadjustamount'] =  $vatadjustamount;
        $data['mktpromoamount'] =  $mktpromoamount;
        // Collection  and Dues
        $data['CollectionDues'] =  $CollectionDues;
        $data['totalRetailerCollection'] =  $totalRetailerCollection;
        $data['totalRetailerDues'] =  $totalRetailerDues;
        
        // Paid to Company
        $data['paidtoCompanies'] =  $paidtoCompanies;
        $data['businessInfo'] =  $businessInfo;
        $data['totalCompanyPaids'] =  $totalCompanyPaids;

        // Product Received
        $data['productReceivedCompanies'] =  $productReceivedCompanies;
        // Insentive Amounts
        $data['insentiveAmounts'] =  $insentiveAmounts;
        $data['totalInsentiveAmount'] =  $totalInsentiveAmount;
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
