<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RequirementType;
use App\Http\Controllers\Controller;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $parent =  RequirementType::where('status', 'publish')->whereNull('parent_id')->get();
        $activeRequirement = RequirementType::where('status', 'publish')->paginate(10);
        $draftRequirement = RequirementType::where('status', 'draft')->paginate(10);
        $trashedRequirement = RequirementType::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.requirementType.index', compact('parent', 'activeRequirement', 'draftRequirement', 'trashedRequirement'));
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

            'name' => 'required',
        ]);
        $photo = $request->file('photo');
        if ($photo) {
            $folder = 'requirement_type';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
          $meta_photo = $request->file('meta_photo');
         if ($meta_photo) {
            $folder = 'subArea';
            $response = cloudUpload($meta_photo, $folder, null);
            $meta_photo = $response;
        }
       
        RequirementType::create([

            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'photo' => $photo,
            'featured_type' => $request->featured_type,
            'slug' => Str::slug($request->name),
            
            'm_photo' => $meta_photo,
            'm_alt_text' => $request->m_alt_text,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
            'custom_header' => $request->header_text,

        ]);
        return back()->with('success', 'Requirement  Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RequirementType $requirementType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequirementType $requirementType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //

        $request->validate([
            'name' => 'required',

        ]);
        $requirementType = RequirementType::find($request->id);
        if ($request->has('photo')) {
            $folder = 'requirement_type';
            $response = cloudUpload($request->photo, $folder, $requirementType->photo);
            $requirementType->photo = $response;
        }
         if ($request->has('meta_photo')) {
            $folder = 'requirement_type';
            $response = cloudUpload($request->meta_photo, $folder, $requirementType->m_photo);
            $requirementType->m_photo = $response;
        }


        RequirementType::where('id', $request->id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'photo' => $requirementType->photo,
            'featured_type' => $request->featured_type,
            'slug' => Str::slug($request->slug ?? $request->name),
            
            'm_photo' => $requirementType->m_photo,
            'm_alt_text' => $request->m_alt_text,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'custom_header' => $request->custom_header,
            'm_description' => $request->m_description,
        ]);
        return back()->with('success', 'Requirement Type Info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequirementType $requirementType)
    {
        $requirementType->status == 'draft';
        $requirementType->save();
        $requirementType->delete();
        return back()->with('success', 'Requirement Type Trashed');
    }
    public function status(RequirementType $requirementType)
    {
        if ($requirementType->status == 'publish') {
            $requirementType->status = 'draft';
            $requirementType->save();
        } else {
            $requirementType->status = 'publish';
            $requirementType->save();
        }
        return back()->with('success', $requirementType->status == 'publish' ? 'Requirement type Published' : 'Requirement Type Drafted');
    }
    public function reStore($id)
    {
        $terms = RequirementType::onlyTrashed()->find($id);
        $terms->restore();
        return back()->with('success', 'RequirementType Info Restored');
    }
    public function permDelete($id)
    {
        $terms = RequirementType::onlyTrashed()->find($id);
        $terms->forceDelete();
        return back()->with('success', 'Terms Info Deleted');
    }
}
