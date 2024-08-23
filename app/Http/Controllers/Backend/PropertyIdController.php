<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PropertyId;
use Illuminate\Http\Request;

class PropertyIdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activePropertyId = PropertyId::where('status', 'publish')->paginate(10);
        $draftPropertyId = PropertyId::where('status', 'draft')->paginate(10);
        $trashedPropertyId = PropertyId::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.propertyId.index', compact('activePropertyId', 'draftPropertyId', 'trashedPropertyId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            'property_id' => 'required',
        ]);
        PropertyId::create([

            'property_id' => $request->property_id,


        ]);
        return back()->with('success', 'PropertyId  Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyId $propertyId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyId $propertyId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PropertyId $propertyId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyId $propertyId)
    {
        //
    }
}
