<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Employee;
use App\Models\Retailer;
use App\Models\RetailerDuesCollection;
use Illuminate\Http\Request;

class DuesCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $items = Retailer::orderBy('id', 'desc')->get();
            $businesses = Business::all();
            $dues = RetailerDuesCollection::orderBy('id', 'desc')->where('transaction', 'sales')->get();
            return view('backend.dues.index', compact('items', 'businesses', 'dues'));
        }
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
                'sales_date' => 'required',
                'invoice_number' => 'required',
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

        $dues = new RetailerDuesCollection();

        $dues->retailer_id = $request->retailer;
        $dues->invoice = $request->invoice_number;
        $dues->invoice_date = $request->sales_date;
        $dues->transaction = 'sales';
        
        $dues->sales_amount = $request->sales_amount;
        $dues->collection_amount = $request->collection_amount;
        $due = $request->sales_amount - $request->collection_amount;
        $dues->due_amount = $due;
        $dues->business_id = $request->business;
        $dues->employee_id = $request->delman;
        $dues->photo = $photo;
        if($due>0){
            $dues->status = 'pending';    
        } else {
            $dues->status = 'clear';    
        }
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

    public function realize_entry(Request $request)
    {
        // $request->validate(
        //     [
        //         'retailer' => 'required',  
        //         'invoice' => 'required',
        //         'collection_amount' => 'required'
        //         // 'business' => 'required',
        //         // 'delman' => 'required',
        //         // 'photo' => 'nullable'
                
        //     ],
        // );
        if ($image = $request->file('photo')) {
            $destinationPath = 'images/dues/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = NULL;
        }

        $dues = new RetailerDuesCollection();

        $dues->retailer_id = $request->retailer;
        $dues->invoice = $request->invoice;
        $dues->invoice_date = $request->collection_date;
        $dues->transaction = 'realization';
        $dues->sales_amount = 0;
        $dues->collection_amount = $request->collection_amount;
        $due = $request->dueold - $request->collection_amount;
        $dues->due_amount = $due;
        $dues->business_id = $request->business;
        $dues->employee_id = $request->employee;
        $dues->photo = $photo;
        if($due>0){
            $dues->status = 'pending';    
        } else {
            $dues->status = 'clear';    
        }
        $dues->save();

        $duesRecord = RetailerDuesCollection::where('invoice', $request->invoice)->where('transaction', 'sales')->first();
        $duesRecord->status = 'clear';
        $duesRecord->update();

        $retailer = Retailer::find($request->retailer);
        $retailer->current_due = $retailer->current_due - $request->collection_amount;
        if($retailer->current_due>19999) {
            $retailer->performance = "poor";
        } elseif($retailer->current_due>9999){
            $retailer->performance = "good";
        } else {
            $retailer->performance = "excellent";
        }
        
        $retailer->update(); 
        //dd($dues);

        return redirect()->back()->with('msg', "Due Realization Entered Successfully ");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dues = RetailerDuesCollection::find($id);
        return view('backend.dues.show', compact('dues'));
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
    public function destroy(string $id)
    {
        //
    }


    public function collection()
    {

    }
}
