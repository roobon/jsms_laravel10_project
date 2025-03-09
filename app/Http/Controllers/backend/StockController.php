<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Point;
use App\Models\SalePaymentStock;
use App\Models\OpeningClosing;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Stock::orderBy('id', 'desc')->get();
        return view('backend.stocks.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        $businesses = Business::all();
        $employees = Employee::all()->where('designation', 'Manager');
        return view('backend.stocks.create', compact('companies', 'businesses', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'invoice' => 'required',
                'product_amount' => 'required',
                'business' => 'required',
                'received_date' => 'required',
                'company' => 'required',
                'employee' => 'required'
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/stock/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = NULL;
        }

        $stock = new Stock;

        $stock->invoice_number = $request->invoice;
        $stock->product_amount = $request->product_amount;
        $stock->business_id = $request->business;
        $stock->received_date = $request->received_date;
        $stock->product_type  = $request->product_type;
        $stock->company_id  = $request->company;
        $stock->employee_id  = $request->employee;
        $stock->invoice_photo = $photo;


        // Get Year and Month from Received date
        $timestamp = strtotime($request->received_date);
        $m = date('m', $timestamp);
        $y = date('Y', $timestamp);


        // Check Target
        $row = DB::table('targets')
            ->whereYear('start_date', $y)
            ->whereMonth('start_date', $m)
            ->where('business_id', '=', $request->business)
            ->get();

        if (count($row) == 0) {
            return back()->with('error', "Sorry, No Target Available for entering Stocks")->withInput();
        } else {
            $stock->save();

           if($request->product_type=='regular'){
            $openClose = OpeningClosing::where('business_id', $request->business)
            ->where('month', $m)
            ->where('year', $y)
            ->where('business_id', $request->business)
            ->where('period', 'closing')
            ->first();

            $openClose->product_received_amount   = $openClose->product_received_amount   + $request->product_amount;
            $openClose->update(); 
           } elseif($request->product_type=='slab'){
            $openClose = OpeningClosing::where('business_id', $request->business)
            ->where('month', $m)
            ->where('year', $y)
            ->where('business_id', $request->business)
            ->where('period', 'closing')
            ->first();

            $openClose->slab_received_amount   = $openClose->slab_received_amount   + $request->product_amount;
            $openClose->update(); 
           } elseif($request->product_type=='vatadjust'){
            $openClose = OpeningClosing::where('business_id', $request->business)
            ->where('month', $m)
            ->where('year', $y)
            ->where('business_id', $request->business)
            ->where('period', 'closing')
            ->first();

            $openClose->vat_adjustment_received_amount   = $openClose->vat_adjustment_received_amount   + $request->product_amount;
            $openClose->update(); 
           } elseif($request->product_type=='mktpromo'){
            $openClose = OpeningClosing::where('business_id', $request->business)
            ->where('month', $m)
            ->where('year', $y)
            ->where('business_id', $request->business)
            ->where('period', 'closing')
            ->first();

            $openClose->promotion_received_amount   = $openClose->promotion_received_amount   + $request->product_amount;
            $openClose->update(); 
           }

            return redirect()->route('stock.index')->with('msg', "Successfully Stock Added");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        $companies = Company::all();
        $businesses = Business::all();
        $employees = Employee::all();
        return view('backend.stocks.edit', compact('companies', 'businesses', 'employees', 'stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        $request->validate(
            [
                'invoice' => 'required',
                'product_amount' => 'required',
                'business' => 'required',
                'received_date' => 'required',
                'company' => 'required',
                'employee' => 'required'
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/stock/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = $stock->invoice_photo;
        }

        $stock->invoice_number = $request->invoice;
        $stock->product_amount = $request->product_amount;
        $stock->business_id = $request->business;
        $stock->received_date = $request->received_date;
        $stock->company_id  = $request->company;
        $stock->employee_id  = $request->employee;
        $stock->invoice_photo = $photo;
        $stock->save();
        return redirect()->route('stock.index')->with('msg', "Successfully Stock Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stock.index')->with('msg', "Deleted Successfully");
    }
}
