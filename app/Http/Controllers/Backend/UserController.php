<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
        ]);
        // $photo = $request->file('photo');
        // if ($photo) {          
        //     $folder = 'frame';
        //     $response = cloudUpload($photo, $folder, null);
        //     $photo = $response;
        // }
       User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
        ]);;
        return back()->with('success', 'User Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
        ]);
        

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);
        return back()->with('success', 'User info Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->status == 'draft';
        $user->save();
        $user->delete();
        return back()->with('success', 'User Info Drafted');
    }
    public function status(User $user)
    {
        if ($user->status == 'publish') {
            $user->status = 'draft';
            $user->save();
        } else {
            $user->status = 'publish';
            $user->save();
        }
        return back()->with('success', $user->status == 'publish' ? 'User info Published' : 'User info Drafted');
    }

    public function reStore($id)
    {
        $user = User::onlyTrashed()->find($id);
        $user->restore();
        return back()->with('success', 'User Info Restored');
    }
    public function permDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'User Info Deleted');
    }

    public function profile()
    {
        return view('backend.admin.profile');
    }

    // public function updateUser(Request $request, User $user)
    // {
    //     $request->validate([
    //         // 'name' => ['required', 'string', 'max:255'],
    //         'email' => ['nullable', 'string', 'email', 'max:255'],
    //         // 'photo' => 'nullable|mimes:png,jpg,jpeg|max:2000',
    //     ]);
    //     $photo = $request->file('photo');
    //     if ($photo) {
    //         $path = public_path('storage/user/' . $user->photo);
    //         if (file_exists($path)) {
    //             unlink($path);
    //         }
    //         $photoName = time() . uniqid() . '.' . $photo->getClientOriginalExtension();
    //         Image::make($photo)->save(public_path('storage/user/' . $photoName));
    //     } else {
    //         $photoName = $request->old_photo;
    //     }
    //     $user->update([
    //         // 'name' => $request->name,
    //         'email' => $request->email,
    //         // 'phone' => $request->phone,
    //         // 'photo' => $photoName,
    //     ]);
    //     return back()->with('success', 'User info Edited!');
    // }
}
