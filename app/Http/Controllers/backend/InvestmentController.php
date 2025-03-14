<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Investment;
use App\Models\OpeningClosing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $businesses = Business::all();
        return view('backend.investment.create', compact('businesses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'amount' => 'required',
                'date' => 'required',
                'business' => 'required',
                'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/investment/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = NULL;
        }

        $investment = new Investment;

        $investment->investment_amount = $request->amount;
        $investment->investment_date = $request->date;
        $investment->business_id = $request->business;
        $investment->investment_photo = $photo;

         // Get Year and Month from Investment date
         $timestamp = strtotime($request->date);
         $m = date('m', $timestamp);
         $y = date('Y', $timestamp);
        
    //     // Check Target
    //      $row = DB::table('targets')
    //      ->whereYear('start_date', $y)
    //      ->whereMonth('start_date', $m)
    //      ->where('business_id', '=', $request->business)
    //      ->get();

    //      //return dd($row);
    //  if (count($row) == 0) {
    //      return back()->with('error', "Sorry, No Target Entry Available for entering Investment")->withInput();
    //  } else {
        
        $investment->save();
    //  }
        
        $openClose = OpeningClosing::where('business_id', $request->business)
            ->where('month', $m)
            ->where('year', $y)
            ->where('business_id', $request->business)
            ->where('period', 'opening')
            ->get();
        if(count($openClose)>0){
            $openClose->investment_amount = $openClose->investment_amount + $request->amount;
            $openClose->update(); 
        }

      
        
       
        // Investment update to Closing Investment End

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
        $businesses = Business::all();
        return view('backend.investment.edit', compact('investment', 'businesses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investment $investment)
    {
        $request->validate(
            [
                'amount' => 'required',
                'date' => 'required',
                'business' => 'required',
                'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048'
            ]
        );
        if ($image = $request->file('photo')) {
            $destinationPath = 'images/investment/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = $investment->investment_photo;
        }

        $investment->investment_amount = $request->amount;
        $investment->investment_date = $request->date;
        $investment->business_id = $request->business;
        $investment->investment_photo = $photo;

        $investment->update();

        return redirect()->route('investment.index')->with('msg', "Successfully updated investment");
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
