<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
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
            'name' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,webp,svg,gif|image',
            'description' => 'required',
            'caption' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonial_image', 'public');

            $testimonial = Testimonial::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'image' => $imagePath,
                'caption' => $validatedData['caption'] ?? '',
                'created_by' => Auth::user()->id
            ]);
        } else {
            $testimonial = Testimonial::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'caption' => $validatedData['caption'] ?? '',
                'created_by' => Auth::user()->id
            ]);
        }

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
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

        $team = Testimonial::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonial_image', 'public');

            $team->update([
                'name' => $request->name,
                'caption' => $request->caption,
                'description' => $request->description ?? '',
                'image' => $imagePath,
                'created_by' => Auth::user()->id
            ]);
        } else {
            $team->update([
                'name' => $request->name,
                'caption' => $request->caption,
                'description' => $request->description ?? '',
                'image' => $request->old_image,
                'created_by' => Auth::user()->id
            ]);
        }
        return redirect()->back()->with('success', 'Testimoni berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();

        return back()->with('success', 'Testimoni berhasil di hapus!');
    }
}
