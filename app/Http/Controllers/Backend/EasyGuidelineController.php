<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EasyGuideline;
use GuzzleHttp\Handler\EasyHandle;
use Illuminate\Http\Request;

class EasyGuidelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeGuideline = EasyGuideline::where('status', 'publish')->where('type', 'main')->paginate(10);
        $draftGuideline = EasyGuideline::where('status', 'draft')->where('type', 'main')->paginate(10);
        $trashedGuideline = EasyGuideline::onlyTrashed()->where('type', 'main')->orderBy('id', 'desc')->paginate(10);
        return view('backend.easyGuideline.index', compact('activeGuideline', 'draftGuideline', 'trashedGuideline'));
    }
    public function indexSub()
    {
        $activeGuideline = EasyGuideline::where('status', 'publish')->where('type', 'sub')->paginate(10);
        $draftGuideline = EasyGuideline::where('status', 'draft')->where('type', 'sub')->paginate(10);
        $trashedGuideline = EasyGuideline::onlyTrashed()->where('type', 'sub')->orderBy('id', 'desc')->paginate(10);
        return view('backend.easyGuideline.indexSub', compact('activeGuideline', 'draftGuideline', 'trashedGuideline'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.easyGuideline.create');
    }
    public function createSub()
    {
        //
        return view('backend.easyGuideline.createSub');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //
        $request->validate([

            'title' => 'nullable',
            'description' => 'nullable',
        ]);


        EasyGuideline::create([

            'title' => $request->title,
            'description' => $request->description,
            'type' => 'main',


        ]);
        return back()->with('success', 'Easy Guideline Main Added Successfully!');
    }
    public function storeSub(Request $request)
    {
        $request->validate([

            'title' => 'nullable',
            'description' => 'nullable',
        ]);


        EasyGuideline::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => 'sub',

        ]);
        return back()->with('success', 'Easy Guideline Sub Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(EasyGuideline $easyGuideline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EasyGuideline $easyGuideline)
    {
        //
    return view('backend.easyGuideline.edit', compact('easyGuideline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EasyGuideline $easyGuideline)
    {
        //
        $request->validate([

            'title' => 'nullable',
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


         $easyGuideline->update([
            'id' => $request->id,

            'title' => $request->title,
            'description' => $request->description,


        ]);

        return redirect(route('backend.easyGuideline.index'))->with('success', 'Easy Guide Info Edited!');
    }
    public function updateSub(Request $request, $easyGuideline)
    {
        
        
    
        //
        $request->validate([

            'title' => 'nullable',
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


        EasyGuideline::where('id', $request->id)->update([
            'id' => $request->id,

            'title' => $request->title,
            'description' => $request->description,


        ]);

        return redirect(route('backend.easyGuideline.indexSub'))->with('success', 'Easy Guide Info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EasyGuideline $easyGuideline)
    {
        //
        $easyGuideline->status == 'draft';
        $easyGuideline->save();
        $easyGuideline->delete();
        return back()->with('success', 'easyGuideline Item Trashed');
    }
    public function status(EasyGuideline $easyGuideline)
    {
        if ($easyGuideline->status == 'publish') {
            $easyGuideline->status = 'draft';
            $easyGuideline->save();
        } else {
            $easyGuideline->status = 'publish';
            $easyGuideline->save();
        }
        return back()->with('success', $easyGuideline->status == 'publish' ? 'easyGuideline info Published' : 'easyGuideline info Drafted');
    }
    public function reStore($id)
    {
        $EasyGuideline = EasyGuideline::onlyTrashed()->find($id);
        $EasyGuideline->restore();
        return back()->with('success', 'EasyGuideline Info Restored');
    }
    public function permDelete($id)
    {
        $EasyGuideline = EasyGuideline::onlyTrashed()->find($id);
        $EasyGuideline->forceDelete();
        return back()->with('success', 'EasyHandleEasyGuideline Info Deleted');
    }
}
