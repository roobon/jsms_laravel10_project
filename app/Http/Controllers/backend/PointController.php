<?php

namespace App\Http\Controllers\backend;

use App\Models\Point;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Point::orderBy('id', 'desc')->get();
        return view('backend.point.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.point.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'point_name' => 'required | max:100 | min:5',
                'point_address' => 'required'
            ],

        );

        $point = new Point;

        $point->point_name = $request->point_name;
        $point->point_address = $request->point_address;
        $point->save();

        return redirect()->route('point.index')->with('msg', "Successfully Point Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Point $point)
    {
        return view('backend.point.show', compact('point'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Point $point)
    {
        return view('backend.point.edit', compact('point'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Point $point)
    {
        $request->validate(
            [
                'point_name' => 'required | max:100 | min:5',
                'point_address' => 'required'
            ],

        );

        $point->point_name = $request->point_name;
        $point->point_address = $request->point_address;
        $point->update();

        return redirect()->route('point.index')->with('msg', "Successfully Point Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Point $point)
    {
        $point->delete();
        return redirect()->route('point.index')->with('msg', 'Deleted Successfully');
    }
}
