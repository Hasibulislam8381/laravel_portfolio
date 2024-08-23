<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activeFaq = Faq::where('status', 'publish')->paginate(10);
        $draftFaq = Faq::where('status', 'draft')->paginate(10);
        $trashedFaq = Faq::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.faq.index', compact('activeFaq','draftFaq','trashedFaq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
           
            'question' => 'nullable',
            'answer' => 'nullable',
        ]);
        $photo = $request->file('photo');
       
        // if ($photo) {
        //     $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
        //     Image::make($photo)->save(public_path('storage/blog/' . $photoName));
        // }
       
        Faq::create([
            
            'question' => $request->question,
            'answer' => $request->answer,
          

        ]);
        return back()->with('success', 'Faq Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
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
           
            'question' => 'nullable',
            'answer' => 'nullable',
           
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
     
      
        Faq::where('id', $request->id)->update([
            'id' => $request->id,
           
            'question' => $request->question,
            'answer' => $request->answer,


        ]);

        return redirect(route('backend.faq.index'))->with('success', 'Faq Info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        //
        $faq->status == 'draft';
        $faq->save();
        $faq->delete();
        return back()->with('success', 'Faq Item Trashed');
    }
    public function status(Faq $faq)
    {
        if ($faq->status == 'publish') {
            $faq->status = 'draft';
            $faq->save();
        } else {
            $faq->status = 'publish';
            $faq->save();
        }
        return back()->with('success', $faq->status == 'publish' ? 'Faq info Published' : 'Faq info Drafted');
    }
    public function reStore($id)
    {
        $faq = Faq::onlyTrashed()->find($id);
        $faq->restore();
        return back()->with('success', 'Faq Info Restored');
    }
    public function permDelete($id)
    {
        $faq = Faq::onlyTrashed()->find($id);
        $faq->forceDelete();
        return back()->with('success', 'Faq Info Deleted');
    }
}
