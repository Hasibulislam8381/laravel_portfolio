<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner2;
use Illuminate\Http\Request;

class Banner2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activeBanner = Banner2::where('status', 'publish')->paginate(10);
        $draftBanners = Banner2::where('status', 'draft')->paginate(10);
        $trashedBanners = Banner2::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.banner2.index', compact('activeBanner','draftBanners','trashedBanners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.banner2.create');
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
            'description' => 'nullable',
        ]);
        $photo = $request->file('photo');
       
        // if ($photo) {
        //     $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
        //     Image::make($photo)->save(public_path('storage/blog/' . $photoName));
        // }
        if ($photo) {
            $folder = 'banner2';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
      
        Banner2::create([
            'photo' => $photo,
            'title' => $request->title,
            'description' => $request->description,
            'alt_text' => $request->alt_text,

        ]);
        return back()->with('success', 'Banner 2 Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner2 $banner2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner2 $banner2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner2 $banner2)
    {
        //
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
            'title' => 'required',
            'description' => 'nullable',
           
        ]);

        // if ($photo) {
        //     $path = public_path('storage/blog/' . $blog->photo);
        //     if (file_exists($path)) {
        //         unlink($path);
        //     }

        //     $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
        //     Image::make($photo)->save(public_path('storage/blog/' . $photoName));
        // } else {
        //     $photoName = $blog->photo;
        // }
        if ($request->has('photo')) {
            $folder = 'banner2';
            $response = cloudUpload($request->photo, $folder, $banner2->photo);
            $banner2->photo = $response;
        }
       
      
        Banner2::where('id', $request->id)->update([
            'id' => $request->id,
            'photo' => $banner2->photo,
            'title' => $request->title,
            'description' => $request->description,
            'alt_text' => $request->alt_text,

        ]);

        return redirect(route('backend.banner2.index'))->with('success', 'Banner 2 Info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner2 $banner2)
    {
        //
        $banner2->status == 'draft';
        $banner2->save();
        $banner2->delete();
        return back()->with('success', 'Banner 2 Item Trashed');
    }
    public function status(Banner2 $banner2)
    {
        if ($banner2->status == 'publish') {
            $banner2->status = 'draft';
            $banner2->save();
        } else {
            $banner2->status = 'publish';
            $banner2->save();
        }
        return back()->with('success', $banner2->status == 'publish' ? 'Banner 2 info Published' : 'Banner 2 info Drafted');
    }
    public function reStore($id)
    {
        $banner = Banner2::onlyTrashed()->find($id);
        $banner->restore();
        return back()->with('success', 'Banner 2 Info Restored');
    }
    public function permDelete($id)
    {
        $banner = Banner2::onlyTrashed()->find($id);
        $banner->forceDelete();
        return back()->with('success', 'Banner 2 Info Deleted');
    }
}
