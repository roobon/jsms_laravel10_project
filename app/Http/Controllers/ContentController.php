<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ContentController extends Controller
{
    public function index(){

        $doctors = DB::table('doctors')->get();
        $admins = DB::table('admins')->get();
        dd($admins);
        return view('backend.content1_dashboard', compact('doctors'));
    }
}
