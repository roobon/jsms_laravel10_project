<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialist;
use Illuminate\Http\Request;



class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Doctor::orderBy('id', 'desc')->get();
        return view('backend.doctor.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialists = Specialist::all();
        return view('backend.doctor.create', compact('specialists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required | max:100 | min:5',
                'specialist' => 'required',
                'email' => 'required | email | max:50 ',
                'password' => 'required | min:8 | confirmed ',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'required',
            ],

        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = 'images/nophoto.jpg';
        }


        $doctor = new Doctor;

        $doctor->name = $request->name;
        $doctor->specialist_id = $request->specialist;
        $doctor->email = $request->email;
        $doctor->password = bcrypt($request->password);
        $doctor->photo = $photo;
        $doctor->status = $request->status;

        $doctor->save();

        return redirect()->route('doctor.index')->with('msg', "Successfully Doctor Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('backend.doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $specialists = Specialist::all();
        return view('backend.doctor.edit', compact('doctor', 'specialists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate(
            [
                'name' => 'required | max:100 | min:5',
                'specialist' => 'required',
                'email' => 'required | email | max:50 ',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'required',
            ],

        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = $doctor->photo;
        }

        $doctor->name = $request->name;
        $doctor->specialist_id = $request->specialist;
        $doctor->email = $request->email;
        $doctor->password = $doctor->password;
        $doctor->photo = $photo;
        $doctor->status = $request->status;

        $doctor->update();
        return redirect()->route('doctor.index')->with('msg', "Successfully Doctor Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctor.index')->with('msg', 'Deleted Successfully');
    }
}
