<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Point;
use App\Models\SalePaymentStock;
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
        $businesses = Business::all();
        $employees = Employee::all();
        return view('backend.stocks.create', compact('businesses', 'employees'));
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
                'employee' => 'required'
            ],

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

            // To update the point record where month and year matched from received date
            // $stock = SalePaymentStock::where('point_id', $request->point)
            //     ->whereMonth('start_date', $m)->whereYear('start_date', $y)->first();
            // $stock->godownstock = $stock->godownstock + $request->product_amount;

            // $stock->update();

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
