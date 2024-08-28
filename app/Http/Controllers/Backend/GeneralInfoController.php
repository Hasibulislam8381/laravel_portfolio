<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralInfo;
use Illuminate\Http\Request;

class GeneralInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(GeneralInfo $generalInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneralInfo $generalInfo)
    {
        return view('backend.generalInfo.edit', compact('generalInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GeneralInfo $generalInfo)
    {
        $request->validate([
            'site_name' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'logo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
            'favicon_logo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
            'footer_logo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
            'facebook' => 'nullable',
            'instragram' => 'nullable',
            'linkedin' => 'nullable',
            'youtube' => 'nullable',
            'address' => 'nullable',
            'copyright_text' => 'nullable',
            'pdf_file' => 'nullable|mimes:pdf|max:5000', // Add validation for the PDF file
        ]);
    
        // Handle PDF file upload
        if ($request->hasFile('pdf_file')) {
            $folder = 'general_info';
            $response = cloudUpload($request->file('pdf_file'), $folder, $generalInfo->pdf_file);
            $generalInfo->pdf_file = $response;
        }
        if ($request->has('logo')) {     
            $folder = 'general_info';
            $response = cloudUpload($request->logo, $folder, $generalInfo->logo);
            $generalInfo->logo = $response;
        }
        if ($request->has('favicon_logo')) {          
            $folder = 'general_info';
            $response = cloudUpload($request->favicon_logo, $folder, $generalInfo->favicon_logo);
            $generalInfo->favicon_logo = $response;
        }
        if ($request->has('footer_logo')) {          
            $folder = 'general_info';
            $response = cloudUpload($request->footer_logo, $folder, $generalInfo->footer_logo);
            $generalInfo->footer_logo = $response;
        }

        $generalInfo->update([
            'site_name' => $request->site_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'logo' => $generalInfo->logo,
            'favicon_logo' => $generalInfo->favicon_logo,
            'footer_logo' => $generalInfo->footer_logo,
            'footer_des' => $request->footer_des,
            'facebook' => $request->facebook,
            'github' => $request->github,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'address' => $request->address,
            'google_analytic' => $request->google_analytic,
            'copyright_text' => $request->copyright_text,
            'pdf_file' => $generalInfo->pdf_file, // Save the PDF file path

        ]);
        return back()->with('success', 'Generral info updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeneralInfo $generalInfo)
    {
        //
    }
}
