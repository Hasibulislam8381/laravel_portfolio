<?php

namespace App\Http\Controllers\Backend;

use App\Models\Content;
use App\Models\SubArea;
use Illuminate\Http\Request;
use App\Models\RequirementType;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subarea = SubArea::get();
        $requirementType = RequirementType::whereNull('parent_id')->get();
        $activeContent = Content::where('status', 'publish')->orderBy('id', 'desc')->paginate(10);
        $draftContent = Content::where('status', 'draft')->paginate(10);
        $trashedContent = Content::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.content.index', compact('subarea', 'requirementType', 'activeContent', 'draftContent', 'trashedContent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $subarea = SubArea::get();
        $requirementType = RequirementType::whereNull('parent_id')->get();
        return view('backend.content.create', compact('subarea', 'requirementType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function upload(Request $request)
    {
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;

        $request->file('upload')->move(public_path('images'), $fileName);

        $CSEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('public/images/' . $fileName);
        $msg = 'Image Uploaded successfully';
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CSEditorFuncNum,'$url','$msg')</script>";

        @header('Content-type:text/html;charset-utf-8');
        echo $response;
    }

    public function store(Request $request)
    {

        $meta_photo = $request->file('meta_photo');
        if ($meta_photo) {
            $folder = 'content';
            $response = cloudUpload($meta_photo, $folder, null);
            $meta_photo = $response;
        }

        Content::create([
            'area_id' => 1,
            'sub_area_id' => $request->sub_area_id,
            'requirement_types_id' => $request->requirement_types_id,
            'title' => $request->title,
            'content' => $request->content,

            'meta_photo' => $meta_photo,
            'alt_text' => $request->alt_text,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'm_description' => $request->m_description,
            'header_text' => $request->header_text,

        ]);
        return back()->with('success', 'Content Added Successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        //

        $subarea = SubArea::get();
        $requirementType = RequirementType::whereNull('parent_id')->get();
        return view('backend.content.edit', compact('content', 'subarea', 'requirementType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
       
        if ($request->has('meta_photo')) {
            $folder = 'content';
            $response = cloudUpload($request->meta_photo, $folder, $content->meta_photo);
            $content->meta_photo = $response;
        }

        $content->update([
            'area_id' => 1,
            'sub_area_id' => $request->sub_area_id,
            'requirement_types_id' => $request->requirement_types_id,
            'title' => $request->title,
            'content' => $request->content,

            'meta_photo' => $content->meta_photo,
            'alt_text' => $request->alt_text,
            'm_title' => $request->m_title,
            'm_keyword' => $request->m_keyword,
            'header_text' => $request->header_text,
            'm_description' => $request->m_description,

        ]);
        return redirect(route('backend.content.index'))->with('success', 'Content Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        //
        $content->status == 'draft';
        $content->save();
        $content->delete();
        return back()->with('success', 'Content Type Trashed');
    }
    public function status(Content $content)
    {
        if ($content->status == 'publish') {
            $content->status = 'draft';
            $content->save();
        } else {
            $content->status = 'publish';
            $content->save();
        }
        return back()->with('success', $content->status == 'publish' ? 'Content Published' : 'Content Drafted');
    }
    public function reStore($id)
    {
        $content = content::onlyTrashed()->find($id);
        $content->restore();
        return back()->with('success', 'content Restored');
    }
    public function permDelete($id)
    {
        $content = content::onlyTrashed()->find($id);
        $content->forceDelete();
        return back()->with('success', 'Team Info Deleted');
    }
 public function uploadimage(Request $request)
{
    if ($request->hasFile('upload')) {
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;

        $request->file('upload')->move(public_path('media'), $fileName);

        $url = asset('/public/media/' . $fileName);
        return response()->json(['fileName' => $fileName,'uploaded'=> 1, 'url' => $url]);
    }

}

}
