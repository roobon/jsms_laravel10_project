<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Insentive;
use App\Models\OpeningClosing;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InsentiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Insentive::orderBy('id', 'desc')->get();
        return view('backend.insentive.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businesses = Business::all();
        $companies =  Company::all();
        return view('backend.insentive.create', compact('businesses', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'month' => 'required',
                'year' => 'required',
                'amount' => 'required',
                'date' => 'required',
                'business' => 'required',
                'company' => 'required',
                'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/insentive/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = NULL;
        }

        $insentive = new Insentive;

        $insentive->insentive_amount = $request->amount;

        
        $month = $request->month;
        $year = $request->year;
        $date = $year . '-' . $month . '-' . '00'; 
        $insentive->incentive_month = $date;
        $insentive->received_date = $request->date;
        $insentive->business_id = $request->business;
        $insentive->company_id = $request->company;
        
         // Get Year and Month from Investment date
         $timestamp = strtotime($request->date);
         $m = date('m', $timestamp);
         $y = date('Y', $timestamp);
        
        // Check Target
         $row = DB::table('targets')
         ->whereYear('start_date', $y)
         ->whereMonth('start_date', $m)
         ->where('business_id', '=', $request->business)
         ->get();
//dd($insentive);
         //return dd($row);
     if (count($row) == 0) {
         return back()->with('error', "Sorry, No Target Entry Available for entering Insentive")->withInput();
     } else {
        
        $insentive->save();
     }


     $openClose = OpeningClosing::where('business_id', $request->business)
     ->where('month', $m)
     ->where('year', $y)
     ->where('business_id', $request->business)
     ->where('period', 'closing')
     ->first();

    $openClose->insentive_received_amount = $openClose->insentive_received_amount + $request->amount;
 
    $openClose->update(); 
    // Insentive update to Closing Insentive End
       
        return redirect()->route('insentive.index')->with('msg', "Successfully incentive Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Insentive $insentive)
    {
        return view('backend.insentive.show', compact('insentive'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insentive $insentive)
    {
        $businesses = Business::all();
        return view('backend.insentive.edit', compact('insentive', 'businesses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insentive $insentive)
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
            $destinationPath = 'images/insentive/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = $insentive->investment_photo;
        }

        $insentive->investment_amount = $request->amount;
        $insentive->investment_date = $request->date;
        $insentive->business_id = $request->business;
        $insentive->investment_photo = $photo;

        $insentive->update();

        return redirect()->route('insentive.index')->with('msg', "Successfully updated investment");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insentive $insentive)
    {
        $insentive->delete();
        return redirect()->route('insentive.index')->with('msg', 'Deleted Successfully');
    }
}
