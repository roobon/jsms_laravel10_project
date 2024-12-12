<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Point;
use Illuminate\Http\Request;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Employee::orderBy('id', 'desc')->get();
        return view('backend.employee.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $points = Point::all();
        return view('backend.employee.create', compact('points'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'admin_id' => 'required',
                'name' => 'required',
                'designation' => 'required',
                'address' => 'min:8',
                'joining_date' => 'required',
                'contact_number' => 'min:11',
                'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required',
            ],

        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/employee/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = 'images/employee/noempphoto.jpg';
        }

        $employee = new Employee;

        $employee->admin_id = $request->admin_id;
        $employee->name = $request->name;
        $employee->designation = $request->designation;
        $employee->address = $request->address;
        $employee->dob = $request->dob;
        $employee->joining_date = $request->joining_date;
        $employee->contact_number  = $request->contact_number;
        $employee->photo = $photo;
        $employee->nid = $request->nid;
        $employee->resume = $request->resume;
        $employee->status = $request->status;

        $employee->save();

        return redirect()->route('retailer.index')->with('msg', "Successfully Retailer Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('backend.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('backend.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate(
            [
                'admin_id' => 'required',
                'name' => 'required',
                'designation' => 'required',
                'address' => 'min:8',
                'joining_date' => 'required',
                'contact_number' => 'min:11',
                'status' => 'required',
                'photo' => 'image|mimes:jpeg,png,jpg|max:2048'
            ],

        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/employee/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = $employee->photo;
        }

        $employee->admin_id = $request->admin_id;
        $employee->name = $request->name;
        $employee->designation = $request->designation;
        $employee->address = $request->address;
        $employee->dob = $request->dob;
        $employee->joining_date = $request->joining_date;
        $employee->contact_number  = $request->contact_number;
        $employee->photo = $photo;
        $employee->nid = $request->nid;
        $employee->resume = $request->resume;
        $employee->status = $request->status;

        $employee->update();

        return redirect()->route('retailer.index')->with('msg', "Successfully Employee Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')->with('msg', 'Deleted Successfully');
    }
}
