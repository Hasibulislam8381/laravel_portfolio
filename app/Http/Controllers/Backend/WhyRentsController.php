<?php

namespace App\Http\Controllers\Backend;

use App\Models\WhyRents;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhyRentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeWR = WhyRents::where('status', 'publish')->paginate(10);
        $draftWR = WhyRents::where('status', 'draft')->paginate(10);
        $trashedWR = WhyRents::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.whyRents.index', compact('activeWR', 'draftWR', 'trashedWR'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.whyRents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        $photo = $request->file('photo');
        if ($photo) {
            $folder = 'whyRent';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        WhyRents::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $photo,
            'alt_text' => $request->alt_text,
            'slug' => Str::slug($request->title),

        ]);
        return back()->with('success', 'Why Rents Info Added Successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(WhyRents $whyRents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyRents $whyRents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhyRents $whyRents)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);

        if ($request->has('photo')) {
            $folder = 'whyRent';
            $response = cloudUpload($request->photo, $folder, $whyRents->photo);
            $whyRents->photo = $response;
        }
        WhyRents::where('id', $request->id)->update([
            'title' => $request->title,
            'slug' => Str::slug($request->slug ?? $request->title),
            'description' => $request->description,
            'alt_text' => $request->alt_text,
            'photo' => $whyRents->photo,

        ]);
        return back()->with('success', 'Why Rents Info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyRents $whyRents)
    {
        $whyRents->status == 'draft';
        $whyRents->save();
        $whyRents->delete();
        return back()->with('success', 'Why Rents Info Trashed');
    }
    public function status(WhyRents $whyRents)
    {
        if ($whyRents->status == 'publish') {
            $whyRents->status = 'draft';
            $whyRents->save();
        } else {
            $whyRents->status = 'publish';
            $whyRents->save();
        }
        return back()->with('success', $whyRents->status == 'publish' ? 'Why Rents info Published' : 'Why RentsInfo Drafted');
    }
    public function reStore($id)
    {
        $whyRents = WhyRents::onlyTrashed()->find($id);
        $whyRents->restore();
        return back()->with('success', 'Why Rents Info Restored');
    }
    public function permDelete($id)
    {
        $whyRents = WhyRents::onlyTrashed()->find($id);
        $whyRents->forceDelete();
        return back()->with('success', 'Why Rents Info Deleted');
    }
}