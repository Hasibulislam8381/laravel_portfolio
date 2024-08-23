<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ExploreArea;
use Illuminate\Http\Request;

class ExploreAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeExplore = ExploreArea::where('status', 'publish')->paginate(10);
        $draftExplore = ExploreArea::where('status', 'draft')->paginate(10);
        $trashedExplore = ExploreArea::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.explore.index', compact('activeExplore', 'draftExplore', 'trashedExplore'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.explore.create');
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
            $folder = 'exploreArea';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        ExploreArea::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'photo' => $photo,

        ]);
        return back()->with('success', 'Explore Are Info Added Successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExploreArea $exploreArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExploreArea $exploreArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExploreArea $exploreArea)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);

        if ($request->has('photo')) {
            $folder = 'exploreArea';
            $response = cloudUpload($request->photo, $folder, $exploreArea->photo);
            $exploreArea->photo = $response;
        }
        ExploreArea::where('id', $request->id)->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'photo' => $exploreArea->photo,

        ]);
        return back()->with('success', 'Explore Area Info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExploreArea $exploreArea)
    {
        $exploreArea->status == 'draft';
        $exploreArea->save();
        $exploreArea->delete();
        return back()->with('success', 'Explore Area Info Trashed');
    }
    public function status(ExploreArea $exploreArea)
    {
        if ($exploreArea->status == 'publish') {
            $exploreArea->status = 'draft';
            $exploreArea->save();
        } else {
            $exploreArea->status = 'publish';
            $exploreArea->save();
        }
        return back()->with('success', $exploreArea->status == 'publish' ? 'Explore Area  info Published' : 'Explore Area Info Drafted');
    }
    public function reStore($id)
    {
        $exploreArea = ExploreArea::onlyTrashed()->find($id);
        $exploreArea->restore();
        return back()->with('success', 'Explore Area Info Restored');
    }
    public function permDelete($id)
    {
        $exploreArea = ExploreArea::onlyTrashed()->find($id);
        $exploreArea->forceDelete();
        return back()->with('success', 'Explore Area Info Deleted');
    }
}
