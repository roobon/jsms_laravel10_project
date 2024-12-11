<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Point;
use App\Models\Retailer;
use Illuminate\Http\Request;



class AdminHomeController extends Controller
{
    public function index()
    {
        $totalCompany = Company::all()->count();
        $totalPoint = Point::all()->count();
        $totalRetailer = Retailer::all()->count();
        $totalEmployee = Employee::all()->count();

        //return $totalCompany;
        return view('backend.admin_dashboard', compact('totalCompany', 'totalPoint', 'totalRetailer', 'totalEmployee'));
    }
}
