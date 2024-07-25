<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        $validatedData = $request->validate([
            'image.*' => 'required|image|mimes:jpg,png,jpeg,gif,webp',
            'title' => 'required|string',
            'description' => 'required',
            'date' => 'required|date',
            'topic_title' => 'string',
            'topic_subtopic' => 'string',
            'topic_description' => 'string',
        ]);

        $activity = new Activity;
        $activity->title = $validatedData['title'];
        $activity->description = $validatedData['description'];
        $activity->trademark = $request->author ?? 'Administrator';
        $activity->date = $validatedData['date'];
        $activity->slug = Str::slug($validatedData['title'], '-');
        $activity->topic_title = $validatedData['topic_title'] ?? '';
        $activity->topic_subtitle = $validatedData['topic_subtopic'] ?? '';
        $activity->topic_description = $validatedData['topic_description'] ?? '';
        $activity->created_by = Auth::user()->id;

        if ($request->hasFile('image')) {
            $images = [];
            foreach ($request->file('image') as $file) {
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
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image.*' => 'image|mimes:jpg,png,jpeg,gif,webp',
            'title' => 'required|string',
            'description' => 'required',
            'date' => 'required|date',
            'topic_title' => 'string|nullable',
            'topic_subtopic' => 'string|nullable',
            'topic_description' => 'string|nullable',
        ]);

        // Find the activity by ID
        $activity = Activity::findOrFail($id);
        $activity->title = $validatedData['title'];
        $activity->description = $validatedData['description'];
        $activity->trademark = $request->author ?? 'Administrator';
        $activity->date = $validatedData['date'];
        $activity->slug = Str::slug($validatedData['title'], '-');
        $activity->topic_title = $validatedData['topic_title'] ?? '';
        $activity->topic_subtitle = $validatedData['topic_subtopic'] ?? '';
        $activity->topic_description = $validatedData['topic_description'] ?? '';
        $activity->created_by = Auth::user()->id;

        if ($request->hasFile('image')) {
            // Delete old images if they exist
            if ($activity->image) {
                $oldImages = json_decode($activity->image, true);
                foreach ($oldImages as $oldImage) {
                    $filePath = storage_path('app/public/' . $oldImage);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

            // Upload new images
            $images = [];
            foreach ($request->file('image') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $path = $file->storeAs('activity_image', $filename, 'public');
                $images[] = $path;
            }
            $activity->image = json_encode($images);
        }

        $activity->save();

        return redirect()->back()->with('success', 'Aktifitas berhasil diubah!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);
        if ($activity->image) {
            $images = json_decode($activity->image, true);

            foreach ($images as $imagePath) {
                $filePath = storage_path('app/public/' . $imagePath);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }

        $activity->delete();

        return back()->with('success', 'Aktifitas berhasil di hapus!');
    }
}
