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
        $managers = Employee::where('designation', 'Manager')->get();
        $delmans = Employee::where('designation', 'Delivery Man')->get();
        return view('backend.retailer.create', compact('points', 'managers', 'delmans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'shop_name' => 'required',
                'proprietor_name' => 'required',
                'address' => 'min:10',
                'retailer_code' => 'required',
                'contact_person' => 'min:4',
                'contact_number' => 'min:11',
                'contact_email' => 'nullable|email',
                'business_starts' => 'required',
                'point' => 'required',
                'manager' => 'required',
                'delman' => 'required',
                'performance' => 'required'
            ],

        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/retailer/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = NULL;
        }

        $retailer = new Retailer;

        $retailer->shop_name = $request->shop_name;
        $retailer->proprietor_name = $request->proprietor_name;
        $retailer->market_name = $request->market_name;
        $retailer->shop_address = $request->address;
        $retailer->retailer_code = $request->retailer_code;
        $retailer->contact_person = $request->contact_person;
        $retailer->contact_number = $request->contact_number;
        $retailer->contact_email  = $request->contact_email;
        $retailer->business_starts = $request->business_starts;
        $retailer->performance = $request->performance;
        $retailer->point_id = $request->point;
        $retailer->manager_id = $request->manager;
        $retailer->delman_id = $request->delman;
        $retailer->photo = $photo;

        $retailer->save();

        // DB::table('retailer_dues')->insert([
        //     'retailer_id' =>         $retailer->id,
        //     'current_due' =>  $request->last_balance,

        // ]);

        return redirect()->route('retailer.index')->with('msg', "Retailer Created Successfully");
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
        $managers = Employee::where('designation', 'Manager')->get();
        $delmans = Employee::where('designation', 'Delivery Man')->get();
        return view('backend.retailer.edit', compact('retailer', 'points', 'managers', 'delmans'));
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
                'retailer_code' => 'required',
                'contact_person' => 'min:4',
                'contact_number' => 'min:11',
                'contact_email' => 'nullable|email',
                'business_starts' => 'required',
                'point' => 'required',
                'manager' => 'required',
                'delman' => 'required',
                'performance' => 'required'
            ],

        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/retailer/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = $retailer->photo;
        }

        $retailer->shop_name = $request->shop_name;
        $retailer->proprietor_name = $request->proprietor_name;
        $retailer->market_name = $request->market_name;
        $retailer->shop_address = $request->address;
        $retailer->retailer_code = $request->retailer_code;
        $retailer->contact_person = $request->contact_person;
        $retailer->contact_number = $request->contact_number;
        $retailer->contact_email  = $request->contact_email;
        $retailer->business_starts = $request->business_starts;
        $retailer->performance = $request->performance;
        $retailer->point_id = $request->point;
        $retailer->manager_id = $request->manager;
        $retailer->delman_id = $request->delman;
        $retailer->photo = $photo;

        $retailer->update();

        //DB::table('users')
        // ->where('id', $user->id)
        // ->update(['active' => true]);

        // DB::table('retailer_dues')
        //     ->where('retailer_id', $retailer->id)
        //     ->update(['current_due' => $request->last_balance]);

        return redirect()->route('retailer.index')->with('msg', "Successfully Retailer Updated");
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
