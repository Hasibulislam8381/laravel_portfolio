<?php

namespace App\Http\Controllers\Backend;

use App\Models\Area;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeArea = Area::where('status', 'publish')->paginate(10);
        $draftArea = Area::where('status', 'draft')->paginate(10);
        $trashedArea = Area::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.area.index', compact('activeArea', 'draftArea', 'trashedArea'));
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
        $photo = $request->file('photo');
        $request->validate([
            'name'=>'required',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($photo) {          
            $folder = 'area';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        Area::create([
            'name' => $request->name,
            'photo' => $photo,

        ]);
        return back()->with('success', 'Area Info Added Successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);
        
        if ($request->has('photo')) {          
            $folder = 'area';
            $response = cloudUpload($request->photo, $folder, $area->photo);
            $area->photo = $response;
        }
        Area::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'photo' => $area->photo,

        ]);
        return back()->with('success', 'Area Info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        $area->status == 'draft';
        $area->save();
        $area->delete();
        return back()->with('success', 'Area Info Trashed');
    }
    public function status(Area $area)
    {
        if ($area->status == 'publish') {
            $area->status = 'draft';
            $area->save();
        } else {
            $area->status = 'publish';
            $area->save();
        }
        return back()->with('success', $area->status == 'publish' ? 'Area  info Published' : 'Area Info Drafted');
    }
    public function reStore($id)
    {
        $area = Area::onlyTrashed()->find($id);
        $area->restore();
        return back()->with('success', 'Area Info Restored');
    }
    public function permDelete($id)
    {
        $area = Area::onlyTrashed()->find($id);
        $area->forceDelete();
        return back()->with('success', 'Area Info Deleted');
    }
}
