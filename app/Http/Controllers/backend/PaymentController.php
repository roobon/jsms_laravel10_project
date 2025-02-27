<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Point;
use App\Models\Retailer;
use App\Models\OpeningClosing;
use App\Models\SalePaymentStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Payment::orderBy('id', 'desc')->get();
        return view('backend.payment.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        $businesses = Business::all();
        $employees = Employee::all()->where('designation', 'Manager');
        return view('backend.payment.create', compact('companies', 'businesses', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'transfer_method' => 'required',
                'voucher' => 'required',
                'payment_amount' => 'required',
                'company' => 'required',
                'business' => 'required',
                'employee' => 'required',
                'payment_date' => 'required',
            ],

        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/payment/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = NULL;
        }


        $payment = new Payment;

        $payment->transfer_method = $request->transfer_method;
        $payment->cheque_voucher = $request->voucher;
        $payment->payment_amount = $request->payment_amount;
        $payment->company_id = $request->company;
        $payment->business_id = $request->business;
        $payment->employee_id = $request->employee;
        $payment->payment_date = $request->payment_date;
        $payment->cheque_voucher_photo = $photo;
        $payment->payment_note = $request->payment_note;
        //$payment->save();

        // Get Year and Month from Received date
        $timestamp = strtotime($request->payment_date);
        $m = date('m', $timestamp);
        $y = date('Y', $timestamp);


        // Check Target
        $row = DB::table('targets')
            ->whereYear('start_date', $y)
            ->whereMonth('start_date', $m)
            ->where('business_id', '=', $request->business)
            ->get();

        if (count($row) == 0) {
            return back()->with('error', "Sorry, No Target Entry Available for entering Payments")->withInput();
        } else {
            $payment->save();

            $openClose = OpeningClosing::where('business_id', $request->business)
            ->where('month', $m)
            ->where('year', $y)
            ->where('business_id', $request->business)
            ->where('period', 'closing')
            ->first();

        $openClose->bank_deposit_amount  = $openClose->bank_deposit_amount  + $request->payment_amount;
        
        $openClose->update(); 
        // Investment update to Closing Investment End
            return redirect()->route('payment.index')->with('msg', "Successfully Payment Added");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
