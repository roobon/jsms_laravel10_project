<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Point;
use App\Models\Retailer;
use App\Models\Sales;
use App\Models\Stock;
use App\Models\Target;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;




class AdminHomeController extends Controller
{
    public function index()
    {
        $curMonth = date('F');
        $curYear = date('Y');

        $totalCompany = Company::all()->count();
        $totalPoint = Point::all()->count();
        $totalRetailer = Retailer::all()->count();
        $totalEmployee = Employee::all()->count();

        $targets = Target::select('*')->whereMonth('start_date', Carbon::now()->month)->sum('ims_target');
        $payments = Payment::select('*')->whereMonth('payment_date', Carbon::now()->month)->sum('payment_amount');
        $stocks = Stock::select('*')->whereMonth('received_date', Carbon::now()->month)->sum('product_amount');
        $sales = Sales::select('*')->whereMonth('sales_date', Carbon::now()->month)->sum('total_amount');

        //return $totalCompany;
        return view('backend.admin_dashboard', compact('totalCompany', 'totalPoint', 'totalRetailer', 'totalEmployee', 'targets', 'sales', 'payments', 'stocks', 'curMonth', 'curYear'));
    }
}
