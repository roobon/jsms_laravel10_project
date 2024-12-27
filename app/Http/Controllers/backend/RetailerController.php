<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Point;
use App\Models\Retailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Retailer::orderBy('id', 'desc')->get();
        return view('backend.retailer.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $points = Point::all();
        $employees = Employee::all();
        return view('backend.retailer.create', compact('points', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'shop_name' => 'required',
                'proprieter_name' => 'required',
                'address' => 'min:10',
                'trade_lisence' => 'required',
                'contact_person' => 'min:4',
                'contact_number' => 'min:11',
                'contact_email' => 'email',
                'business_starts' => 'required',
                'last_business' => 'required',
                'point' => 'required',
                'employee' => 'required',
                'status' => 'required',
            ],

        );

        $retailer = new Retailer;

        $retailer->shop_name = $request->shop_name;
        $retailer->proprietor_name = $request->proprieter_name;
        $retailer->shop_address = $request->address;
        $retailer->trade_lisence = $request->trade_lisence;
        $retailer->contact_person = $request->contact_person;
        $retailer->contact_number = $request->contact_number;
        $retailer->contact_email  = $request->contact_email;
        $retailer->business_starts = $request->business_starts;
        $retailer->last_business = $request->last_business;
        $retailer->last_balance = $request->last_balance;
        if ($request->last_balance > 0) {
            $retailer->status = 'inactive';
        } else {
            $retailer->status = $request->status;
        }
        $retailer->point_id = $request->point;
        $retailer->employee_id = $request->employee;

        $retailer->save();

        DB::table('retailer_dues')->insert([
            'retailer_id' =>         $retailer->id,
            'current_due' =>  $request->last_balance,

        ]);

        return redirect()->route('retailer.index')->with('msg', "Successfully Retailer Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Retailer $retailer)
    {
        //dd($retailer);
        return view('backend.retailer.show', compact('retailer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Retailer $retailer)
    {
        $points = Point::all();
        $employees = Employee::all();
        return view('backend.retailer.edit', compact('retailer', 'points', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Retailer $retailer)
    {
        $request->validate(
            [
                'shop_name' => 'required',
                'proprietor_name' => 'required',
                'address' => 'min:10',
                'trade_lisence' => 'required',
                'contact_person' => 'min:4',
                'contact_number' => 'min:11',
                'contact_email' => 'email',
                'business_starts' => 'required',
                'last_business' => 'required',
                'point' => 'required',
                'employee' => 'required',
                'status' => 'required',
            ],

        );

        $retailer->shop_name = $request->shop_name;
        $retailer->proprietor_name = $request->proprietor_name;
        $retailer->shop_address = $request->address;
        $retailer->trade_lisence = $request->trade_lisence;
        $retailer->contact_person = $request->contact_person;
        $retailer->contact_number = $request->contact_number;
        $retailer->contact_email  = $request->contact_email;
        $retailer->business_starts = $request->business_starts;
        $retailer->last_business = $request->last_business;
        $retailer->last_balance = $request->last_balance;
        $retailer->point_id = $request->point;
        $retailer->employee_id = $request->employee;
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
