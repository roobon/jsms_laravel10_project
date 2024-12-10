<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Retailer;
use Illuminate\Http\Request;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { {
            $items = Retailer::orderBy('id', 'desc')->get();
            return view('backend.retailer.index', compact('items'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.retailer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'company_name' => 'required | max:100 | min:5',
                'start_date' => 'required',
                'security_money' => 'required',
                'address' => 'min:8',
                'contact_person' => 'min:4',
                'contact_number' => 'min:11',
                'contact_email' => 'email',
                'status' => 'required',
            ],

        );

        $company = new Retailer;

        $company->company_name = $request->company_name;
        $company->business_starts = $request->start_date;
        $company->security_money = $request->security_money;
        $company->company_address = $request->address;
        $company->contact_person = $request->contact_person;
        $company->contact_number = $request->contact_number;
        $company->contact_email  = $request->contact_email;
        $company->website = $request->website;
        $company->last_business_date = $request->last_business;
        $company->last_balance = $request->last_balance;
        $company->status = $request->status;

        $company->save();

        return redirect()->route('retailer.index')->with('msg', "Successfully Retailer Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Retailer $retailer)
    {
        return view('backend.retailer.show', compact('retailer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Retailer $retailer)
    {
        return view('backend.retailer.edit', compact('retailer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Retailer $retailer)
    {
        $request->validate(
            [
                'company_name' => 'required | max:100 | min:5',
                'start_date' => 'required',
                'security_money' => 'required',
                'address' => 'min:8',
                'contact_person' => 'min:4',
                'contact_number' => 'min:11',
                'contact_email' => 'email',
                'status' => 'required',
            ],

        );

        $retailer->company_name = $request->company_name;
        $retailer->business_starts = $request->start_date;
        $retailer->security_money = $request->security_money;
        $retailer->company_address = $request->address;
        $retailer->contact_person = $request->contact_person;
        $retailer->contact_number = $request->contact_number;
        $retailer->contact_email  = $request->contact_email;
        $retailer->website = $request->website;
        $retailer->last_business_date = $request->last_business;
        $retailer->last_balance = $request->last_balance;
        $retailer->status = $request->status;

        $retailer->update();

        return redirect()->route('retailer.index')->with('msg', "Successfully retailer Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Retailer $retailer)
    {
        $retailer->delete();
        return redirect()->route('retailer.index')->with('msg', 'Deleted Successfully');
    }
}
