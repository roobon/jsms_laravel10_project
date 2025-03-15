<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Company;
use App\Models\Investment;
use App\Models\Point;
use App\Models\Target;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Target::orderBy('id', 'desc')->get();
        return view('backend.target.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $points = Point::orderBy('id')->get();
        $companies = Company::orderBy('id')->get();
        $businesses = Business::orderBy('id')->get();
        return view('backend.target.create', compact('points', 'companies', 'businesses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'start_date' => 'required',
                'end_date' => 'required',
                'ims_target' => 'required',
                'collection_target' => 'required',
                'working_days' => 'required',
                'business' => 'required'
            ],
        );

        $target = new Target;

        $target->start_date = $request->start_date;
        $target->end_date = $request->end_date;
        $target->ims_target = $request->ims_target;
        $target->collection_target = $request->collection_target;
        $target->working_days = $request->working_days;
        $target->business_id = $request->business;


        $row = DB::table('targets')
            ->where('start_date', '=', $request->start_date)
            ->where('end_date', '=', $request->end_date)
            ->where('business_id', '=', $request->business)
            ->get();

        if (count($row) > 0) {
            return back()->with('error', "Sorry, Target Entry Already Exist")->withInput();
        } else {
            $target->save();
            $business = Business::find($request->business);
            
            $date = Carbon::createFromFormat('Y-n-d', $request->start_date);
            $month = $date->format('n');
            $year = $date->format('Y');
            $date = Carbon::createFromFormat('Y-m-d', $request->start_date)->subMonth();

  

            $prevStartDate = $date->format('Y-m-d');
    
            $closingRow = DB::table('opening_closing')->select('*')
                ->where('report_date', $prevStartDate)
                ->where('business_id', $request->business)
                ->where('period', 'closing')
                ->first();

                // return dd($closingRow);
           if($closingRow!=null ){
                DB::table('opening_closing')->insert([

                    'security_money' =>  $closingRow->security_money,
                    'investment_amount' =>  $closingRow->investment_amount,
                    'bank_deposit_amount' =>  $closingRow->bank_deposit_amount,
                    'product_received_amount' => $closingRow->product_received_amount,
                    'slab_received_amount' =>   $closingRow->slab_received_amount,
                    'vat_adjustment_received_amount' =>   $closingRow->vat_adjustment_received_amount,
                    'promotion_received_amount' =>   $closingRow->promotion_received_amount,
                    'insentive_received_amount' => $closingRow->insentive_received_amount,
                    'sales_amount' =>  $closingRow->sales_amount,
                    'collection_amount' => $closingRow->collection_amount,
                    'due_amount' => $closingRow->due_amount,
                    'due_realize_amount' => $closingRow->due_realize_amount,
                    'total_due_amount' => $closingRow->total_due_amount,
                    'ho_deposit_amount' => $closingRow->ho_deposit_amount,
                    'report_date' => $request->start_date,
                    'month' => $month,
                    'year' => $year,
                    'business_id' => $closingRow->business_id,
                    'period' => 'opening',
                    'status' => 'ended',

                ]);
                DB::table('opening_closing')->insert([

                    'security_money' =>  $closingRow->security_money,
                    'investment_amount' =>  $closingRow->investment_amount,
                    'bank_deposit_amount' =>  $closingRow->bank_deposit_amount,
                    'product_received_amount' => $closingRow->product_received_amount,
                    'slab_received_amount' =>   $closingRow->slab_received_amount,
                    'vat_adjustment_received_amount' =>   $closingRow->vat_adjustment_received_amount,
                    'promotion_received_amount' =>   $closingRow->promotion_received_amount,
                    'insentive_received_amount' => $closingRow->insentive_received_amount,
                    'sales_amount' =>  $closingRow->sales_amount,
                    'collection_amount' => $closingRow->collection_amount,
                    'due_amount' => $closingRow->due_amount,
                    'due_realize_amount' => $closingRow->due_realize_amount,
                    'total_due_amount' => $closingRow->total_due_amount,
                    'ho_deposit_amount' => $closingRow->ho_deposit_amount,
                    'report_date' => $request->start_date,
                    'month' => $month,
                    'year' => $year,
                    'business_id' => $closingRow->business_id,
                    'period' => 'closing',
                    'status' => 'running',
                ]);
            } else {
            //    Find Investment Amount
            
            $Investments = Investment::where('business_id', $request->business)
            ->get();
           
            
            $InvestmentTotal = $Investments->sum('investment_amount');
            
            DB::table('opening_closing')->insert([

                'security_money' =>  $business->security_money,
                'investment_amount' =>  $InvestmentTotal, // all investments will collect and pass
                'bank_deposit_amount' =>  0,
                'product_received_amount' => 0,
                'slab_received_amount' =>   0,
                'vat_adjustment_received_amount' =>   0,
                'promotion_received_amount' =>   0,
                'insentive_received_amount' => 0,
                'sales_amount' =>  0,
                'collection_amount' => 0,
                'due_amount' => 0,
                'due_realize_amount' => 0,
                'total_due_amount' => 0,
                'ho_deposit_amount' => 0,
                'report_date' => $request->start_date,
                'month' => $month,
                'year' => $year,
                'business_id' => $request->business,
                'period' => 'opening',
                'status' => 'ended',

            ]);
            DB::table('opening_closing')->insert([

               'security_money' =>  $business->security_money,
                'investment_amount' =>  $InvestmentTotal,
                'bank_deposit_amount' =>  0,
                'product_received_amount' => 0,
                'slab_received_amount' =>   0,
                'vat_adjustment_received_amount' =>   0,
                'promotion_received_amount' =>   0,
                'insentive_received_amount' => 0,
                'sales_amount' =>  0,
                'collection_amount' => 0,
                'due_amount' => 0,
                'due_realize_amount' => 0,
                'total_due_amount' => 0,
                'ho_deposit_amount' => 0,
                'report_date' => $request->start_date,
                'month' => $month,
                'year' => $year,
                'business_id' => $request->business,
                'period' => 'closing',
                'status' => 'running',
            ]);
            }
        }

        return redirect()->route('target.index')->with('msg', "Successfully Target Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Target $target)
    {
        return view('backend.target.show', compact('target'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Target $target)
    {
        $points = Point::orderBy('id')->get();
        $companies = Company::orderBy('id')->get();
        $businesses = Business::orderBy('id')->get();
        return view('backend.target.edit', compact('target', 'points', 'companies', 'businesses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Target $target)
    {
        $request->validate(
            [
                'start_date' => 'required',
                'end_date' => 'required',
                'ims_target' => 'required',
                'collection_target' => 'required',
                'working_days' => 'required',
                'business' => 'required'
            ],
        );

        $target->start_date = $request->start_date;
        $target->end_date = $request->end_date;
        $target->ims_target = $request->ims_target;
        $target->collection_target = $request->collection_target;
        $target->working_days = $request->working_days;
        $target->business_id = $request->business;
        $target->update();
        return redirect()->route('target.index')->with('msg', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Target $target)
    {
        $target->delete();
        return redirect()->route('target.index')->with('msg', 'Deleted Successfully');
    }
}
