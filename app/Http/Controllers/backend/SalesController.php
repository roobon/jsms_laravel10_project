<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\OutgoingSale;
use App\Models\Point;
use App\Models\Retailer;
//use App\Models\Sales;
use Illuminate\Http\Request;




class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = OutgoingSale::orderBy('id', 'desc')->get();
        return view('backend.sales.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $points = Point::all();
        $retailers = Retailer::all();
        return view('backend.sales.create', compact('points', 'retailers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'shop_name' => 'required | max:100 | min:5',
                'business_starts' => 'required',
                'address' => 'min:8',
                'trade_lisence' => 'required',
                'contact_person' => 'min:4',
                'contact_number' => 'min:11',
                'contact_email' => 'email',
                'status' => 'required',
            ],

        );

        $sales = new OutgoingSale;

        $sales->shop_name = $request->shop_name;
        $sales->proprietor_name = $request->proprieter_name;
        $sales->business_starts = $request->business_starts;
        $sales->shop_address = $request->address;
        $sales->trade_lisence = $request->trade_lisence;
        $sales->contact_person = $request->contact_person;
        $sales->contact_number = $request->contact_number;
        $sales->contact_email  = $request->contact_email;
        $sales->last_business = $request->last_business;
        $sales->last_balance = $request->last_balance;
        $sales->status = $request->status;

        $sales->save();

        return redirect()->route('sales.index')->with('msg', "Successfully Retailer Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(OutgoingSale $sales)
    {

        return view('backend.sales.show', compact('sales'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OutgoingSale $sales)
    {
        return view('backend.sales.edit', compact('sales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OutgoingSale $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OutgoingSale $sales)
    {
        return ($sales);
        $sales->delete();
        return redirect()->route('sales.index')->with('msg', 'Deleted Successfully');
    }

    public function retailerInfo(Request $request)
    {
        return $request;
    }
}
