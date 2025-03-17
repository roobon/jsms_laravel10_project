<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Company;
use App\Models\DamageProduct;
use App\Models\Employee;
use Illuminate\Http\Request;

class DamageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = DamageProduct::orderBy('id', 'desc')->get();
        return view('backend.damages.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businesses = Business::all();
        $companies = Company::all();
        $managers = Employee::all()->where('designation', 'Manager');
        return view('backend.damages.create', compact('businesses', 'companies', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DamageProduct $damageProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DamageProduct $damageProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DamageProduct $damageProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DamageProduct $damageProduct)
    {
        //
    }
}
