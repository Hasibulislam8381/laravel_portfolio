<?php

namespace App\Http\Controllers\Backend;

use App\Models\WhatYouWant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhatYouWantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activeWhatYouWants = WhatYouWant::where('status', 'publish')->paginate(10);
        $draftWhatYouWants = WhatYouWant::where('status', 'draft')->paginate(10);
        $trashedWhatYouWants = WhatYouWant::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.WhatYouWant.index', compact('activeWhatYouWants', 'draftWhatYouWants', 'trashedWhatYouWants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.WhatYouWant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
            'title' => 'required',
        ]);
        $photo = $request->file('photo');

        // if ($photo) {
        //     $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
        //     Image::make($photo)->save(public_path('storage/blog/' . $photoName));
        // }
        if ($photo) {
            $folder = 'WhatYouWant';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }

        WhatYouWant::create([

            'title' => $request->title,
            'photo' => $photo,
            'alt_text' => $request->alt_text,
            'slug' => Str::slug($request->title),

        ]);
        return back()->with('success', 'What you want Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(WhatYouWant $whatYouWant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhatYouWant $whatYouWant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhatYouWant $WhatYouWant)

    {

        //
        $request->validate([
            'title' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);

        if ($request->has('photo')) {
            $folder = 'WhatYouWant';
            $response = cloudUpload($request->photo, $folder, $WhatYouWant->photo);
            $WhatYouWant->photo = $response;
        }
        WhatYouWant::where('id', $request->id)->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'alt_text' => $request->alt_text,
            'photo' => $WhatYouWant->photo,

        ]);

        return redirect(route('backend.WhatYouWant.index'))->with('success', 'WhatYouWant Info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhatYouWant $WhatYouWant)
    {
        //
        $WhatYouWant->status == 'draft';
        $WhatYouWant->save();
        $WhatYouWant->delete();
        return back()->with('success', 'WhatYouWant Item Trashed');
    }
    public function status(WhatYouWant $WhatYouWant)
    {
        if ($WhatYouWant->status == 'publish') {
            $WhatYouWant->status = 'draft';
            $WhatYouWant->save();
        } else {
            $WhatYouWant->status = 'publish';
            $WhatYouWant->save();
        }
        return back()->with('success', $WhatYouWant->status == 'publish' ? 'WhatYouWant info Published' : 'WhatYouWant info Drafted');
    }
    public function reStore($id)
    {
        $WhatYouWant = WhatYouWant::onlyTrashed()->find($id);
        $WhatYouWant->restore();
        return back()->with('success', 'WhatYouWant Info Restored');
    }
    public function permDelete($id)
    {
        $WhatYouWant = WhatYouWant::onlyTrashed()->find($id);
        $WhatYouWant->forceDelete();
        return back()->with('success', 'WhatYouWant Info Deleted');
    }
}
