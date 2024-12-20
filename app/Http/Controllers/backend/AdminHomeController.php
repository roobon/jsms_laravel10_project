<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Point;
use App\Models\Retailer;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;


class AdminHomeController extends Controller
{
    public function index()
    {
        $sales = Sales::select('*')->whereMonth('sales_date', Carbon::now()->month)->sum('total_amount');
        $payments = Payment::select('*')->whereMonth('payment_date', Carbon::now()->month)->sum('payment_amount');
        $totalCompany = Company::all()->count();
        $totalPoint = Point::all()->count();
        $totalRetailer = Retailer::all()->count();
        $totalEmployee = Employee::all()->count();

        //return $totalCompany;
        return view('backend.admin_dashboard', compact('totalCompany', 'totalPoint', 'totalRetailer', 'totalEmployee', 'sales', 'payments'));
    }
}
