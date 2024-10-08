<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metas = Meta::paginate(20);
        return view('backend.meta.index',compact('metas'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Meta $meta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meta $meta)
    {
        return view('backend.meta.edit',compact('meta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meta $meta)
    {
        $request->validate([
            'title'=>'nullable',
            'page_name'=>'nullable',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);

        if ($request->has('photo')) {          
            $folder = 'meta';
            $response = cloudUpload($request->photo, $folder, $meta->meta_photo);
            $meta->meta_photo = $response;
        }

        $meta->update([
            'title'=>$request->title,
            'meta_photo' =>$meta->meta_photo,
            'page_name'=>$request->page_name,
            'description'=>$request->description,
            'custom_header'=>$request->custom_header,
            'keyword'=>$request->keyword,
        ]);
        return redirect(route('backend.meta.index'))->with('success','Meta Info Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meta $meta)
    {
        $meta->delete();
        return back()->with('success', 'Meta Info Deleted!');
    }
}
