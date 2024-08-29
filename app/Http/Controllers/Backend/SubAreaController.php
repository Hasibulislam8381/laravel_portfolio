<?php

namespace App\Http\Controllers\Backend;

use App\Models\Area;
use App\Models\SubArea;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequirementType;

class SubAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeSarea = Area::where('status', 'publish')->paginate(10);
        $draftSarea = Area::where('status', 'draft')->paginate(10);
        $trashedSarea = Area::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.subArea.index', compact('activeSarea', 'draftSarea', 'trashedSarea'));
    }
    public function indexBottom()
    {
        $activeSarea = SubArea::where('status', 'publish')->where('section', 'bottom')->paginate(10);
        $draftSarea = SubArea::where('status', 'draft')->where('section', 'bottom')->paginate(10);
        $trashedSarea = SubArea::onlyTrashed()->where('section', 'bottom')->orderBy('id', 'desc')->paginate(10);
        return view('backend.subArea.indexBottom', compact('activeSarea', 'draftSarea', 'trashedSarea'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::get();
        $project_type = RequirementType::all();
        return view('backend.subArea.create', compact('areas',"project_type"));
    }
    public function createBottom()
    {
        $subAreas = SubArea::get();
        return view('backend.subArea.createBottom', compact('subAreas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'name' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg|max:2000',

        ]);
        $photo = $request->file('photo');
        if ($photo) {
            $folder = 'subArea';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
          $meta_photo = $request->file('meta_photo');
        if ($meta_photo) {
            $folder = 'subArea';
            $response = cloudUpload($meta_photo, $folder, null);
            $meta_photo = $response;
        }

        Area::create([
            'area_id' => 1,
            'name' => $request->name,
            'url' => $request->url,
            'language' => $request->language,
            'alt_text' => $request->alt_text,
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $photo,
            'video' => $request->video,
            'section' => 'top',
            'project_type_id'=> $request->project_type_id,
            
            'm_photo' => $meta_photo,
            'm_alt_text' => $request->m_alt_text,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
            'custom_header' => $request->header_text,
        ]);
        return back()->with('success', 'Project Added Successful!');
    }
    public function storeBottom(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);
        $photo = $request->file('photo');
        if ($photo) {
            $folder = 'subArea';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }

        // Find the top section's area_id based on the provided area name
        $topArea = SubArea::where('name', $request->area)
            ->where('section', 'top')
            ->first();

        // Create the bottom section with the same area_id as the top section
        SubArea::create([
            'area_id' => 1, // Set the area_id from the top section
            'name' => $request->area,
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $photo,
            'video' => $request->video,
            'section' => 'bottom',
        ]);
        return back()->with('success', 'Sub Area Bottom Section Added Successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubArea $subArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, SubArea $subArea)
    {
      
        $areas = Area::get();
        $project_type = RequirementType::all();
        return view('backend.subArea.edit', compact('areas','project_type'));
    }
    public function editBottom(SubArea $subArea)
    {
        $subAreas = SubArea::get();
        return view('backend.subArea.editBottom', compact('subArea', 'subAreas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubArea $subArea)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($request->has('photo')) {
            $folder = 'subArea';
            $response = cloudUpload($request->photo, $folder, $subArea->photo);
            $subArea->photo = $response;
        }
    if ($request->has('meta_photo')) {
            $folder = 'subArea';
            $response = cloudUpload($request->meta_photo, $folder, $subArea->m_photo);
            $subArea->m_photo = $response;
        }
        
        $subArea->update([
            'area_id' => 1,
            'project_type_id'=> $request->project_type_id,
            'name' => $request->name,
            'url' => $request->url,
            'language' => $request->language,
            'alt_text' => $request->alt_text,
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $subArea->photo,
            'video' => $request->video,
            'url' => $request->url,
            'section' => 'top',
            
            
            'm_photo' => $subArea->m_photo,
            'm_alt_text' => $request->m_alt_text,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'custom_header' => $request->header_text,
            'm_description' => $request->m_description,
        ]);
        return redirect(route('backend.subArea.index'))->with('success', 'Sub Area Top Section Edit Successful!');
    }
    public function updateBottom(Request $request, SubArea $subArea)
    {
        $request->validate([
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($request->has('photo')) {
            $folder = 'subArea';
            $response = cloudUpload($request->photo, $folder, $subArea->photo);
            $subArea->photo = $response;
        }
        $topArea = SubArea::where('name', $request->area)
            ->where('section', 'top')
            ->first();

        $subArea->update([
            'area_id' => 1,
            'name' => $request->area,
            'alt_text' => $request->alt_text,
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $subArea->photo,
            'video' => $request->video,
            'section' => 'bottom',
        ]);
        return redirect(route('backend.subArea.indexBottom'))->with('success', 'Sub Area Bottom Section Edit Successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubArea $subArea)
    {
        $subArea->status == 'draft';
        $subArea->save();
        $subArea->delete();
        return back()->with('success', 'Sub Area Info Trashed');
    }
    public function status(SubArea $subArea)
    {
        if ($subArea->status == 'publish') {
            $subArea->status = 'draft';
            $subArea->save();
        } else {
            $subArea->status = 'publish';
            $subArea->save();
        }
        return back()->with('success', $subArea->status == 'publish' ? 'Sub Area info Published' : 'Sub Area info Drafted');
    }
    public function reStore($id)
    {
        $subArea = SubArea::onlyTrashed()->find($id);
        $subArea->restore();
        return back()->with('success', 'Sub Area Info Restored');
    }
    public function permDelete($id)
    {
        $subArea = SubArea::onlyTrashed()->find($id);
        $subArea->forceDelete();
        return back()->with('success', 'Sub Area Info Deleted');
    }
}
