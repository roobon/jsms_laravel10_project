<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Company::orderBy('id', 'desc')->get();
        return view('backend.company.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.company.create');
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
                'address' => 'nullable|min:8',
                'contact_person' => 'min:4',
                'contact_number' => 'min:11',
                'contact_email' => 'nullable|email',
                'status' => 'required',
            ],

        );

        $company = new Company;

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

        return redirect()->route('company.index')->with('msg', " Company Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('backend.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('backend.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
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

        $company->update();

        return redirect()->route('company.index')->with('msg', "Successfully Company Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index')->with('msg', 'Deleted Successfully');
    }
}
