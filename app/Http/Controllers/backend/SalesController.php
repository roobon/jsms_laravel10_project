<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Point;
use App\Models\Retailer;
use App\Models\RetailerDues;
use App\Models\OpeningClosing;
use App\Models\SalePaymentStock;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Sales::with('retailer')->with('point')->get();
        return view('backend.sales.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $managers = Employee::where('designation', 'Manager')->get();
        $delmans = Employee::where('designation', 'Delivery Man')->get();
        $businesses = Business::all();
        return view('backend.sales.create', compact('delmans', 'managers', 'businesses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'delman' => 'required',
                'total_amount' => 'required',
                'collection_amount' => 'required',
                'manager' => 'required',
                'business' => 'required',
                'sales_date' => 'required',
            ],

        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/sales/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = NULL;
        }

        $sales = new Sales();

        $sales->delman_id = $request->delman;
        $sales->total_amount = $request->total_amount;
        $sales->collection_amount = $request->collection_amount;
        $currentDue = $sales->total_amount - $sales->collection_amount;
        $sales->due_amount = $sales->total_amount - $sales->collection_amount;
        $sales->business_id = $request->business;
        $sales->manager_id = $request->manager;
        $sales->sales_date = $request->sales_date;
        $sales->voucher_photo = $photo;


        // Get Year and Month from Received date
        $timestamp = strtotime($request->sales_date);
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
            $sales->save();

            $openClose = OpeningClosing::where('business_id', $request->business)
            ->where('month', $m)
            ->where('year', $y)
            ->where('business_id', $request->business)
            ->where('period', 'closing')
            ->first();

        $openClose->sales_amount = $openClose->sales_amount + $request->total_amount;
        $openClose->collection_amount = $openClose->collection_amount + $request->collection_amount;
        $openClose->due_amount = $openClose->due_amount + $currentDue;
        
        $openClose->update(); 
        // Investment update to Closing Investment End

         

            return redirect()->route('sales.index')->with('msg', "Successfully Sales Completed");
        }


        // if ($prev = DB::table('sales_payments_stocks')->find($request->point)) {
        //     DB::table('sales_payments_stocks')->where('point_id', $request->point)
        //         ->update([

        //             'sales_amount' =>  $request->total_amount + $prev->sales_amount,
        //             'collection_amount' =>  $request->collection_amount + $prev->collection_amount
        //         ]);
        // } else {
        //     DB::table('sales_payments_stocks')->insert([
        //         'point_id' =>  $request->point,
        //         'sales_amount' =>  $request->total_amount,
        //         'collection_amount' =>  $request->collection_amount
        //     ]);
        // }


        return redirect()->route('sales.index')->with('msg', "Successfully Sales Entered");
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sales, $id)
    {
        $sales = Sales::find($id);
        //dd($sales);
        return view('backend.sales.show', compact('sales'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sales, $id)
    {
        $sales = Sales::find($id);
        //dd($sale);
        return view('backend.sales.edit', compact('sales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
       $sales->delete();
        return redirect()->route('sales.index')->with('msg', 'Deleted Successfully');
    }

    public function retailerInfo(Request $request)
    {
        return $request;
    }
}
