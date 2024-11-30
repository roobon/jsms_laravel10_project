<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Specialist;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Specialist::orderBy('id', 'desc')->get();
        return view('backend.specialist.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.specialist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $specialist = new Specialist;
        
        $specialist->name = $request->specialist;
        $specialist->details = $request->details;
        
        $specialist->save();

        return redirect()->route('specialist.index')->with('msg', "Successfully Created");
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialist $specialist)
    {
        //dd($specialist);
        return view('backend.specialist.show', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialist $specialist)
    {
        return view('backend.specialist.edit', compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialist $specialist)
    {
        $specialist->name = $request->specialist;
        $specialist->details = $request->details;

        $specialist->update();

        return redirect()->route('specialist.index')->with('msg', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialist $specialist)
    {
         $specialist->delete();
         return redirect()->route('specialist.index')->with('msg', 'Deleted Successfully');
    }
}
