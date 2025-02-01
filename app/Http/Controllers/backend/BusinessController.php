<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Company;
use App\Models\Point;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Business::orderBy('id', 'desc')->get();
        $list = "Business List (All)";
        return view('backend.business.index', compact('items', 'list'));
    }

    public function active()
    {
        return "Hello";
        $items = Business::orderBy('id', 'desc')->where('status', 'active')->get();
        return $items;
        $list = "Active Business List";
        return view('backend.business.index', compact('items', 'list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $points = Point::all();
        $companies = Company::all();
        return view('backend.business.create', compact('points', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'business_name' => 'required',
                'launch_date' => 'required',
                'security_money' => 'required',
                'point' => 'required',
                'company' => 'required',
                'status' => 'required',
                'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/business/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = NULL;
        }

        $business = new Business;

        $business->business_name = $request->business_name;
        $business->launch_date = $request->launch_date;
        $business->security_money = $request->security_money;
        $business->point_id = $request->point;
        $business->company_id = $request->company;
        $business->launch_photo = $photo;
        $business->status = $request->status;

        $business->save();

        return redirect()->route('business.index')->with('msg', "Successfully Business Added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business)
    {
        return view('backend.business.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business)
    {
        $points = Point::all();
        $companies = Company::all();
        return view('backend.business.edit', compact('business', 'points', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Business $business)
    {
        $request->validate(
            [
                'business_name' => 'required',
                'launch_date' => 'required',
                'security_money' => 'required',
                'point' => 'required',
                'company' => 'required',
                'status' => 'required',
                'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/business/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = $business->launch_photo;
        }

        $business->business_name = $request->business_name;
        $business->launch_date = $request->launch_date;
        $business->security_money = $request->security_money;
        $business->point_id = $request->point;
        $business->company_id = $request->company;
        $business->launch_photo = $photo;
        $business->status = $request->status;

        $business->update();

        return redirect()->route('business.index')->with('msg', "Successfully Business Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {
        $business->delete();
        return redirect()->route('business.index')->with('msg', 'Deleted Successfully');
    }
}
