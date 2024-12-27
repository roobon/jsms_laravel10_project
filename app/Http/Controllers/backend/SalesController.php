<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Point;
use App\Models\Retailer;
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
        $points = Point::all();
        $retailers = Retailer::all();
        $employees = Employee::all();
        $companies = Company::all();
        return view('backend.sales.create', compact('points', 'retailers', 'employees', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'retailer' => 'required',
                'voucher' => 'required',
                'total_amount' => 'required',
                'collection_amount' => 'required',
                'employee' => 'required',
                'point' => 'required',
                'sales_date' => 'required',
            ],

        );

        $sales = new Sales();

        $sales->retailer_id = $request->retailer;
        $sales->invoice_number = $request->voucher;
        $sales->total_amount = $request->total_amount;
        $sales->collection_amount = $request->collection_amount;
        $sales->due_amount = $sales->total_amount - $sales->collection_amount;
        $sales->point_id = $request->point;
        $sales->company_id = $request->company;
        $sales->employee_id = $request->employee;
        $sales->sales_date = $request->sales_date;
        $sales->voucher_photo = 'images/voucher/no_voucherphoto.jpg';


        // Get Year and Month from Received date
        $timestamp = strtotime($request->sales_date);
        $m = date('m', $timestamp);
        $y = date('Y', $timestamp);


        // Check Target
        $row = DB::table('targets')
            ->whereYear('start_date', $y)
            ->whereMonth('start_date', $m)
            ->where('point_id', '=', $request->point)
            //->where('company_id', '=', $request->company)
            ->get();

        if (count($row) == 0) {
            return redirect()->back()->with('error', "Sorry, No Target Available for entering Stocks");
        } else {
            $sales->save();

            if ($sales->due_amount > 0) {
                $retailer = Retailer::find($request->retailer);
                $retailer->status = 'inactive';
                $retailer->update();
            }

            // To update the point record where month and year matched from received date
            $stock = SalePaymentStock::where('point_id', $request->point)
                ->whereMonth('start_date', $m)->whereYear('start_date', $y)->first();

            $stock->sales_amount = $stock->sales_amount + $request->total_amount;
            $stock->collection_amount = $stock->collection_amount + $request->collection_amount;

            $stock->update();

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
    public function destroy(Sales $sales, $id)
    {
        $sale = Sales::find($id);
        //dd($sale->delete());
        return redirect()->route('sales.index')->with('msg', 'Deleted Successfully');
    }

    public function retailerInfo(Request $request)
    {
        return $request;
    }
}
