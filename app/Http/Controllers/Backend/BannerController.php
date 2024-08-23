<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activeBanner = Banner::where('status', 'publish')->paginate(10);
        $draftBanners = Banner::where('status', 'draft')->paginate(10);
        $trashedBanners = Banner::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.banner.index', compact('activeBanner', 'draftBanners', 'trashedBanners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'short_des' => 'nullable',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        $photo = $request->file('photo');

        // if ($photo) {
        //     $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
        //     Image::make($photo)->save(public_path('storage/blog/' . $photoName));
        // }
        if ($photo) {
            $folder = 'banner';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }

        Banner::create([

            'title' => $request->title,
            'short_des' => $request->short_des,
            'photo' => $photo,
            'alt_text' => $request->alt_text,

        ]);
        return back()->with('success', 'Banner Added Successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //
        $request->validate([
            'title' => 'required',
            'short_des' => 'nullable',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
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
            $folder = 'banner';
            $response = cloudUpload($request->photo, $folder, $banner->photo);
            $banner->photo = $response;
        }


        Banner::where('id', $request->id)->update([
            'id' => $request->id,
            'title' => $request->title,
            'short_des' => $request->short_des,
            'alt_text' => $request->alt_text,
            'photo' => $banner->photo,


        ]);

        return redirect(route('backend.banner.index'))->with('success', 'Banner Info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
        $banner->status == 'draft';
        $banner->save();
        $banner->delete();
        return back()->with('success', 'Banner Item Trashed');
    }
    public function status(Banner $banner)
    {
        if ($banner->status == 'publish') {
            $banner->status = 'draft';
            $banner->save();
        } else {
            $banner->status = 'publish';
            $banner->save();
        }
        return back()->with('success', $banner->status == 'publish' ? 'Banner info Published' : 'Banner info Drafted');
    }
    public function reStore($id)
    {
        $banner = Banner::onlyTrashed()->find($id);
        $banner->restore();
        return back()->with('success', 'Banner Info Restored');
    }
    public function permDelete($id)
    {
        $banner = Banner::onlyTrashed()->find($id);
        $banner->forceDelete();
        return back()->with('success', 'Banner Info Deleted');
    }
}