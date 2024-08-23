<?php

namespace App\Http\Controllers\Backend;

use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activeTeam = Team::where('status', 'publish')->paginate(10);
        $draftTeam = Team::where('status', 'draft')->paginate(10);
        $trashedTeam = Team::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('backend.team.index', compact('activeTeam', 'draftTeam', 'trashedTeam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.team.create');
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
            $folder = 'team';
            $response = cloudUpload($photo, $folder, null);
            $photo = $response;
        }
        Team::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'photo' => $photo,

        ]);
        return back()->with('success', 'Team Info Added Successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
        ]);

        if ($request->has('photo')) {
            $folder = 'team';
            $response = cloudUpload($request->photo, $folder, $team->photo);
            $team->photo = $response;
        }
        Team::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'designation' => $request->designation,
            'photo' => $team->photo,

        ]);
        return back()->with('success', 'Team Info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->save();
        $team->delete();
        return back()->with('success', 'Team Info Trashed');
    }
    public function status(Team $team)
    {
        if ($team->status == 'publish') {
            $team->status = 'draft';
            $team->save();
        } else {
            $team->status = 'publish';
            $team->save();
        }
        return back()->with('success', $team->status == 'publish' ? 'Team info Published' : 'Team info Drafted');
    }
    public function reStore($id)
    {
        $team = Team::onlyTrashed()->find($id);
        $team->restore();
        return back()->with('success', 'Team Info Restored');
    }
    public function permDelete($id)
    {
        $team = Team::onlyTrashed()->find($id);
        $team->forceDelete();
        return back()->with('success', 'Team Info Deleted');
    }
}
