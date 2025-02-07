<?php

namespace App\Http\Controllers\backend;

use App\Models\Deposit;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Deposit::orderBy('id', 'desc')->get();
        return view('backend.deposit.index', compact('items'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businesses = Business::all();
        $managers = Employee::where('designation', 'Manager')->get();
        return view('backend.deposit.create', compact('businesses', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'point_name' => 'required',
                'point_address' => 'required',
                'opening_date' => 'required'
            ],

        );

        $point = new Deposit;

        $point->point_name = $request->point_name;
        $point->point_address = $request->point_address;
        $point->opening_date = $request->opening_date;
        $point->save();

        return redirect()->route('points.index')->with('msg', "Center Created Successfully ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Deposit $deposit)
    {
        $employee = DB::table('employees')->where('deposit_id', $deposit->id)->get();
        if (count($employee) > 0) {
            return view('backend.deposit.show', compact('deposit', 'employee'));
        } else {
            return view('backend.deposit.show', compact('deposit'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deposit $deposit)
    {
        return view('backend.deposit.edit', compact('deposit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deposit $deposit)
    {
        $deposit->delete();
        return redirect()->route('deposit.index')->with('msg', 'Deposit item Deleted Successfully');
    }
}
