<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
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
        return view('backend.dues.create', compact('retailers', 'businesses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'retailer' => 'required',
                'sales_memo' => 'required',
                'sales_date' => 'required',
                'due_amount' => 'required',
                'business' => 'required',
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
        $dues->sales_memo = $request->sales_memo;
        $dues->sales_date = $request->sales_date;
        $dues->due_amount = $request->due_amount;
        $dues->business_id = $request->business;
        $dues->photo = $photo;
        $dues->save();
        $retailer = Retailer::find($request->retailer);
        $retailer->current_due = $retailer->current_due + $request->due_amount;
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
