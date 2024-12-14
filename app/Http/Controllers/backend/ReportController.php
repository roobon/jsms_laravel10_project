<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ReportController extends Controller
{
    public function index()
    {

        return view('backend.reports.companyReport');
    }
}
