<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Company;
use App\Models\DamageProduct;
use App\Models\Employee;
use Illuminate\Http\Request;

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

         // Get Year and Month from Investment date
         $timestamp = strtotime($request->date);
         $m = date('m', $timestamp);
         $y = date('Y', $timestamp);
               
        $damage->save();
        return redirect()->route('damage.index')->with('msg', "Successfully Damage Product Entered");
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
