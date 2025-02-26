<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Collection;
use App\Models\Retailer;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Collection::orderBy('id', 'desc')->get();
        return view('backend.collections.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $retailers = Retailer::all();
        $businesses = Business::all();
        return view('backend.collections.create', compact('retailers', 'businesses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'retailer' => 'required',
                'sales_memo' => 'required',
                'collection_amount' => 'required',
                'collection_date' => 'required',
                'business' => 'required',
                'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/collection/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = NULL;
        }

        $collection = new Collection;

        $collection->retailer_id = $request->retailer;    
        $collection->sales_memo = $request->sales_memo;
        $collection->collection_amount = $request->collection_amount;
        $collection->collection_date = $request->collection_date;
 
        $collection->business_id = $request->business;
        
       

        $retailer = Retailer::find($request->retailer);
        $retailer->current_due = $retailer->current_due -  $request->collection_amount;
        $collection->rest_amount = $retailer->current_due;

        $collection->save();
        
        $retailer->update();




        return redirect()->route('collection.index')->with('msg', "Successfully collection Added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        return view('backend.collection.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        return view('backend.collection.show', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $collection)
    {
        $request->validate(
            [
                'retailer' => 'required',
                'sales_memo' => 'required',
                'collection_amount' => 'required',
                'collection_date' => 'required',
                'rest_amount' => 'required',
                'business' => 'required',
                'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            ]
        );

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/collection/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath . $postImage;
        } else {
            $photo = NULL;
        }

        $collection->retailer_id = $request->retailer;    
        $collection->sales_memo = $request->sales_memo;
        $collection->collection_amount = $request->collection_amount;
        $collection->collection_date = $request->collection_date;
        $collection->rest_amount = $request->rest_amount;
        $collection->business_id = $request->business;
        
        $collection->update();
        $retailer = Retailer::find($request->retailer);
        $retailer->current_due = $retailer->current_due -  $request->collection_amount;
        $retailer->update();

        return redirect()->route('collection.index')->with('msg', "Successfully collection Added");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();
        return redirect()->route('collection.index')->with('msg', 'Deleted Successfully');
    }
}
