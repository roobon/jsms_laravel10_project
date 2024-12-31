<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
                'name' => 'required',
                'designation' => 'required',
                'joining_date' => 'required',
                'contact_number' => 'required | min:11',
                'contact_email' => 'nullable',
                'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'nid' => 'nullable|file|mimes:jpg,jpeg,png',
                'resume' => 'nullable|file|mimes:pdf',
                'password' => 'nullable|min:6|confirmed',
                'point' => 'required',
                'status' => 'required',
            ],

        );

        if ($image1 = $request->file('photo')) {
            $destinationPath = 'images/employee/photo/';
            $postImage = date('YmdHis') . "." . $image1->getClientOriginalExtension();
            $image1->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = 'images/employee/nophoto.jpg';
        }

        if ($image2 = $request->file('nid')) {
            $destinationPath = 'images/employee/nid/';
            $postImage = date('YmdHis') . "." . $image2->getClientOriginalExtension();
            $image2->move($destinationPath, $postImage);
            $nid = $destinationPath . $postImage;
        } else {
            $nid = 'images/employee/nonid.jpg';
        }

        if ($image3 = $request->file('resume')) {
            $destinationPath = 'images/employee/resume/';
            $postImage = date('YmdHis') . "." . $image3->getClientOriginalExtension();
            $image3->move($destinationPath, $postImage);
            $resume = $destinationPath . $postImage;
        } else {
            $resume = 'images/employee/noresume.pdf';
        }

        $employee = new Employee;

        $employee->name = $request->name;
        $employee->designation = $request->designation;
        $employee->address = $request->address;
        $employee->dob = $request->dob;
        $employee->joining_date = $request->joining_date;
        $employee->contact_number  = $request->contact_number;
        $employee->contact_email  = $request->contact_email;
        $employee->password  = Hash::make($request->password);
        $employee->photo = $photo;
        $employee->nid = $nid;
        $employee->resume = $resume;
        $employee->point_id = $request->point;
        $employee->status = $request->status;

        $employee->save();

        return redirect()->route('employee.index')->with('msg', "Successfully Employee Added");
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
        $points = Point::all();
        return view('backend.employee.edit', compact('employee', 'points'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate(
            [
                'name' => 'required',
                'designation' => 'required',
                'joining_date' => 'required',
                'contact_number' => 'required | min:11',
                'contact_email' => 'required',
                'string',
                'lowercase',
                'email',
                'max:100',
                'unique:' . Employee::class,
                'photo' => 'nullable|image|mimes:jpg,jpeg,png',
                'nid' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
                'resume' => 'nullable|file|mimes:pdf',
                'password' => 'nullable|min:6|confirmed',
                'point' => 'required',
                'status' => 'required',
            ],

        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/employee/photo/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = 'images/employee/nophoto.jpg';
        }

        if ($image = $request->file('nid')) {
            $destinationPath = 'images/employee/nid/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $nid = $destinationPath . $postImage;
        } else {
            $nid = 'images/employee/nonid.jpg';
        }

        if ($image = $request->file('resume')) {
            $destinationPath = 'images/employee/resume/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $resume = $destinationPath . $postImage;
        } else {
            $resume = 'images/employee/noresume.pdf';
        }


        $employee->name = $request->name;
        $employee->designation = $request->designation;
        $employee->address = $request->address;
        $employee->dob = $request->dob;
        $employee->joining_date = $request->joining_date;
        $employee->contact_number  = $request->contact_number;
        $employee->contact_email  = $request->contact_email;
        if ($request->password != null) {
            $employee->password  = Hash::make($request->password);
        }
        $employee->photo = $photo;
        $employee->nid = $nid;
        $employee->resume = $resume;
        $employee->point_id = $request->point;
        $employee->status = $request->status;

        $employee->update();

        return redirect()->route('employee.index')->with('msg', "Successfully Employee Updated");
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
