<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
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
        // dd($request->all());
        $validatedData = $request->validate([
            'image.*' => 'required|image|mimes:jpg,png,jpeg,gif,webp',
            'title' => 'required|string',
            'description' => 'required',
            'date' => 'required|date'
        ]);

        $activity = new Activity;
        $activity->title = $validatedData['title'];
        $activity->description = $validatedData['description'];
        $activity->trademark = $request->author ?? 'Administrator';
        $activity->date = $validatedData['date'];

        if($request->hasFile('image')){
            $images = [];
            foreach($request->file('image') as $file){
                $filename = time() . '-' . $file->getClientOriginalName();
                $path = $file->storeAs('activity_image', $filename, 'public');
                $images[] = $path;
            }
            $activity->image = json_encode($images);
        }
        $activity->save();
        return redirect()->back()->with('success', 'Aktifitas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
