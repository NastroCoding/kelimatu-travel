<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp', 
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('team_images', 'public');

            $team = Team::create([
                'name' => $request->name,
                'description' => $request->description ?? '',
                'image' => $imagePath,
                'created_by' => Auth::user()->id
            ]);
        }

        return redirect()->back()->with('success', 'Member tim berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpg,png,svg,gif,jpeg,webp'
        ]);

        $team = Team::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('team_images', 'public');

            $team->update([
                'name' => $request->name,
                'description' => $request->description ?? '',
                'image' => $imagePath,
                'created_by' => Auth::user()->id
            ]);
        } else {
            $team->update([
                'name' => $request->name,
                'description' => $request->description ?? '',
                'image' => $request->old_image,
                'created_by' => Auth::user()->id
            ]);
        }
        return redirect()->back()->with('success', 'Member tim berhasil di edit!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $team = Team::find($id);
        $filePath = storage_path('app/public/' . $team->image);
        if (file_exists($filePath)) {
            unlink($filePath); 
        }
        $team->delete();

        return back()->with('success', 'Member tim berhasil di hapus!');
    }
}
