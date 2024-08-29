<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Area;
use App\Models\Blog;
use App\Models\Meta;
use App\Models\Team;
use App\Models\About;
use App\Models\Terms;
use App\Models\Banner;
use App\Models\Career;
use App\Models\Banner2;
use App\Models\Content;
use App\Models\Partner;
use App\Models\SubArea;
use App\Models\Property;
use App\Models\WhyRents;
use App\Models\ExploreArea;
use App\Models\GeneralInfo;
use App\Models\WhatYouWant;
use Illuminate\Http\Request;
use App\Models\EasyGuideline;
use App\Models\PropertyStore;
use App\Models\RequirementType;
use Illuminate\Support\Facades\Cache;
use PHPUnit\Metadata\Version\Requirement;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $generalInfo = GeneralInfo::first();
        $about = About::firstOrFail();
        $partners = Partner::get();
        return view('frontend.index', compact('generalInfo','about','partners'));
    }
    public function resume(){

        return view('frontend.pages.resume');
    }
    public function work(){
        $works = Area::all();
        return view('frontend.pages.work',compact('works'));
    }
    public function blog(){

        return view('frontend.pages.blog');
    }
    public function contact(){

        return view('frontend.pages.contact');
    }
    

}
