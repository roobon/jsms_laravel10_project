<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Company;
use App\Models\DamageProduct;
use App\Models\Employee;
use App\Models\OpeningClosing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DamageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = DamageProduct::orderBy('id', 'desc')->get();
        return view('backend.damages.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businesses = Business::all();
        $companies = Company::all();
        $managers = Employee::all()->where('designation', 'Manager');
        return view('backend.damages.create', compact('businesses', 'companies', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'voucher_num' => 'required',
                'claim_date' => 'required',
                'claim_type' => 'required',
                'claim_amount' => 'required',
                'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'business' => 'required',
                'company' => 'required',
                'manager' => 'required'
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/damage/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = NULL;
        }

        $damage = new DamageProduct;

        $damage->voucher_num = $request->voucher_num;
        $damage->claim_date = $request->claim_date;
        $damage->claim_type = $request->claim_type;
        $damage->claim_amount = $request->claim_amount;
        $damage->claim_photo = $photo;
        $damage->business_id = $request->business;
        $damage->company_id = $request->company;
        $damage->employee_id = $request->manager;

        // Get Year and Month from Received date
        $timestamp = strtotime($request->claim_date);
        $m = date('m', $timestamp);
        $y = date('Y', $timestamp);


        // Check Target
        $row = DB::table('targets')
            ->whereYear('start_date', $y)
            ->whereMonth('start_date', $m)
            ->where('business_id', '=', $request->business)
            ->get();

        if (count($row) == 0) {
            return back()->with('error', "Sorry, No Target Available for entering Damages")->withInput();
        } else {
            $damage->save();

           if($request->claim_type == 'replacement'){
            $openClose = OpeningClosing::where('business_id', $request->business)
            ->where('month', $m)
            ->where('year', $y)
            ->where('business_id', $request->business)
            ->where('period', 'closing')
            ->first();

            $openClose->damage_sent_amount   = $openClose->damage_sent_amount + $request->claim_amount;
            $openClose->update(); 
           } elseif($request->claim_type == 'outofpolicy'){
            $openClose = OpeningClosing::where('business_id', $request->business)
            ->where('month', $m)
            ->where('year', $y)
            ->where('business_id', $request->business)
            ->where('period', 'closing')
            ->first();

            $openClose->damage_sent_amount   = $openClose->damage_sent_amount   + $request->claim_amount;
            $openClose->update(); 
           }
        return redirect()->route('damage.index')->with('msg', "Successfully Damage Product Entered");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DamageProduct $damageProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DamageProduct $damageProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DamageProduct $damageProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DamageProduct $damageProduct)
    {
        //
    }
}
