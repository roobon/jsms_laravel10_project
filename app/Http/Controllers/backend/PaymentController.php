<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Point;
use App\Models\Retailer;
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
        $points = Point::all();
        $companies = Company::all();
        $employees = Employee::all();
        return view('backend.payment.create', compact('points', 'companies', 'employees'));
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
                'point' => 'required',
                'company' => 'required',
                'employee' => 'required',
                'payment_date' => 'required',
            ],

        );

        $payment = new Payment;

        $payment->transfer_method = $request->transfer_method;
        $payment->cheque_voucher = $request->voucher;
        $payment->payment_amount = $request->payment_amount;
        $payment->point_id = $request->point;
        $payment->employee_id = $request->employee;
        $payment->company_id = $request->company;
        $payment->payment_date = $request->payment_date;
        $payment->cheque_voucher_photo = 'images/payment/nophoto.jpg';
        //$payment->save();

        // Get Year and Month from Received date
        $timestamp = strtotime($request->payment_date);
        $m = date('m', $timestamp);
        $y = date('Y', $timestamp);


        // Check Target
        $row = DB::table('targets')
            ->whereYear('start_date', $y)
            ->whereMonth('start_date', $m)
            ->where('point_id', '=', $request->point)
            ->where('company_id', '=', $request->company)
            ->get();

        if (count($row) == 0) {
            return redirect()->back()->with('error', "Sorry, No Target Available for entering Stocks");
        } else {
            $payment->save();

            // To update the point record where month and year matched from received date
            $stock = SalePaymentStock::where('point_id', $request->point)
                ->whereMonth('start_date', $m)->whereYear('start_date', $y)->first();
            $stock->deposit_amount  = $stock->deposit_amount + $request->payment_amount;

            $stock->update();

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
