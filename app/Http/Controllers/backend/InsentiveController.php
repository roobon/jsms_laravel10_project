<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Insentive;
use Illuminate\Http\Request;

class InsentiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Insentive::orderBy('id', 'desc')->get();
        return view('backend.insentive.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businesses = Business::all();
        return view('backend.insentive.create', compact('businesses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'amount' => 'required',
                'date' => 'required',
                'business' => 'required',
                'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/insentive/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = NULL;
        }

        $insentive = new Insentive;

        $insentive->insentive_amount = $request->amount;
        $insentive->received_date = $request->date;
        $insentive->business_id = $request->business;
        //$insentive->company_id = $request->company;
        


        $insentive->save();

        return redirect()->route('insentive.index')->with('msg', "Successfully insentive Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Insentive $insentive)
    {
        return view('backend.insentive.show', compact('insentive'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insentive $insentive)
    {
        $businesses = Business::all();
        return view('backend.insentive.edit', compact('insentive', 'businesses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insentive $insentive)
    {
        $request->validate(
            [
                'amount' => 'required',
                'date' => 'required',
                'business' => 'required',
                'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048'
            ]
        );
        if ($image = $request->file('photo')) {
            $destinationPath = 'images/insentive/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = $insentive->investment_photo;
        }

        $insentive->investment_amount = $request->amount;
        $insentive->investment_date = $request->date;
        $insentive->business_id = $request->business;
        $insentive->investment_photo = $photo;

        $insentive->update();

        return redirect()->route('insentive.index')->with('msg', "Successfully updated investment");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insentive $insentive)
    {
        $insentive->delete();
        return redirect()->route('insentive.index')->with('msg', 'Deleted Successfully');
    }
}
