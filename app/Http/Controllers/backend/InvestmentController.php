<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Investment::orderBy('id', 'desc')->get();
        return view('backend.investment.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.investment.create');
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

        $investment = new Investment;

        $investment->shop_name = $request->shop_name;
        $investment->proprietor_name = $request->proprieter_name;
        $investment->business_starts = $request->business_starts;
        $investment->shop_address = $request->address;
        $investment->trade_lisence = $request->trade_lisence;
        $investment->contact_person = $request->contact_person;
        $investment->contact_number = $request->contact_number;
        $investment->contact_email  = $request->contact_email;
        $investment->last_business = $request->last_business;
        $investment->last_balance = $request->last_balance;
        $investment->status = $request->status;

        $investment->save();

        return redirect()->route('investment.index')->with('msg', "Successfully investment Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Investment $investment)
    {
        return view('backend.investment.show', compact('investment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investment $investment)
    {
        return view('backend.investment.edit', compact('investment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investment $investment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investment $investment)
    {
        $investment->delete();
        return redirect()->route('investment.index')->with('msg', 'Deleted Successfully');
    }
}
