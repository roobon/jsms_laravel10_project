<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Employee;
use App\Models\Retailer;
use App\Models\RetailerDues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class DuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = RetailerDues::orderBy('id', 'desc')->get();
        $businesses = Business::all();
        return view('backend.dues.index', compact('items', 'businesses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $retailers = Retailer::all();
        $businesses = Business::all();
        $delmans = Employee::where('designation', 'Delivery Man')->get();
        return view('backend.dues.create', compact('retailers', 'businesses', 'delmans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'retailer' => 'required',
                'invoice_no' => 'required',
                'sales_date' => 'required',
                'sales_amount' => 'required',
                'collection_amount' => 'required',
                'business' => 'required',
                'delman' => 'required',
                'photo' => 'nullable'
            ],
        );
        if ($image = $request->file('photo')) {
            $destinationPath = 'images/dues/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = NULL;
        }

        $dues = new RetailerDues();

        $dues->retailer_id = $request->retailer;
        $dues->invoice_no = $request->invoice_no;
        $dues->sales_date = $request->sales_date;
        $dues->sales_amount = $request->sales_amount;
        $dues->collection_amount = $request->collection_amount;
        $due = $request->sales_amount - $request->collection_amount;
        $dues->due_amount = $due;
        $dues->business_id = $request->business;
        $dues->employee_id = $request->delman;
        $dues->photo = $photo;
        $dues->save();
        $retailer = Retailer::find($request->retailer);
        $retailer->current_due = $retailer->current_due + $due;
        if($retailer->current_due>19999) {
            $retailer->performance = "poor";
        } elseif($retailer->current_due>9999){
            $retailer->performance = "good";
        } 
        
        $retailer->update(); 

        return redirect()->route('dues.index')->with('msg', "Due Entered Successfully ");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RetailerDues $dues)
    {
        $dues->delete();
        return redirect()->route('dues.index')->with('msg', 'Dues Deleted Successfully');
    }
}
