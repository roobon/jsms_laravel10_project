<?php

namespace App\Http\Controllers\backend;

use App\Models\Deposit;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Company;
use App\Models\Employee;
use App\Models\OpeningClosing;
use Carbon\Carbon;
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
                'voucher' => 'required',
                'deposit_amount' => 'required',
                'business' => 'required',
                'deposit_date' => 'required',
                'manager' => 'required',
                'photo' => 'nullable'
            ],

        );

        $point = new Deposit;

        $point->check_voucher_num = $request->voucher;
        $point->deposit_amount = $request->deposit_amount;
        $point->deposit_date = $request->deposit_date;
        $point->deposit_photo = $request->photo;
        $point->business_id = $request->business;
        $point->employee_id = $request->manager;
        $point->save();

        
        // Closing Deposit update 
        $date = Carbon::createFromFormat('Y-n-d', $request->deposit_date);
        $month = $date->format('n');
        $year = $date->format('Y');
        
        $openClose = OpeningClosing::where('business_id', $request->business)
            ->where('month', $month)
            ->where('year', $year)
            ->where('business_id', $request->business)
            ->where('period', 'closing')
            ->first();

        $openClose->ho_deposit_amount = $openClose->ho_deposit_amount + $request->deposit_amount;

        $openClose->update(); 
        // Closing Deposit update 

        return redirect()->route('deposit.index')->with('msg', "Deposit Created Successfully ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Deposit $deposit)
    {
        // $employee = DB::table('employees')->where('deposit_id', $deposit->id)->get();
        // if (count($employee) > 0) {
        //     return view('backend.deposit.show', compact('deposit', 'employee'));
        // } else {
        //     return view('backend.deposit.show', compact('deposit'));
        // }
        return view('backend.deposit.show', compact('deposit'));
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
