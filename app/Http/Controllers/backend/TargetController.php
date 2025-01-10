<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\BusinessLaunch;
use App\Models\Company;
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
        $businesses = BusinessLaunch::orderBy('id')->get();
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
                'point' => 'required',
                'company' => 'required',
                'business' => 'required'

            ],

        );

        $target = new Target;

        $target->start_date = $request->start_date;
        $target->end_date = $request->end_date;
        $target->ims_target = $request->ims_target;
        $target->collection_target = $request->collection_target;
        $target->working_days = $request->working_days;
        $target->point_id = $request->point;
        $target->company_id = $request->company;
        $target->business_id = $request->business;


        $row = DB::table('targets')
            ->where('start_date', '=', $request->start_date)
            ->where('end_date', '=', $request->end_date)
            ->where('point_id', '=', $request->point)
            ->where('company_id', '=', $request->company)
            ->get();

        if (count($row) > 0) {
            return back()->with('error', "Sorry, Target Entry Already Exist")->withInput();
        } else {
            $target->save();
            $business = BusinessLaunch::find($request->business);
            DB::table('opening_closing')->insert([

                'security_money' =>  $business->security_money,
                'investment_amount' =>  0,
                'bank_deposit_amount' =>  0,
                'product_received_amount' => 0,
                'slab_received_amount' =>   0,
                'insentive_received_amount' => 0,
                'sales_amount' =>  0,
                'collection_amount' => 0,
                'due_amount' => 0,
                'due_realize_amount' => 0,
                'total_due_amount' => 0,
                'ho_deposit_amount' => 0,
                'month' => 'January',
                'year' => 2025,
                'point_id' => $request->point,
                'company_id' => $request->company,
                'business_id' => $request->business,
                'period' => 'opening',
                'status' => 'ended',

            ]);
            // DB::table('opening_clossing')->insert([

            //     'ims_target' =>         $request->ims_target,
            //     'collection_target' =>  $request->collection_target,
            //     'start_date' =>         $request->start_date,
            //     'end_date' =>           $request->end_date,
            //     'working_days' =>       $request->working_days,
            //     'point_id' =>           $request->point,
            //     'company_id' =>         $request->company,
            //     'target_id' =>          $target->id
            // ]);
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
        return view('backend.target.edit', compact('target', 'points', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Target $target)
    {
        //
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
