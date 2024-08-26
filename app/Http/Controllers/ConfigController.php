<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Item;
use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Config $config)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'required',
            'gmail' => 'required',
            'whatsapp_num' => 'required',
            'instagram' => 'required',
            'operational' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'map' => 'required',
            'history' => 'required',
            'img_info' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'img_info2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'img_jumbotron' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'img_quote' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'embed' => 'nullable|url',
        ]);

        $config = Config::findOrFail($id);

        if ($request->hasFile('img_info')) {
            $imgInfo = $request->file('img_info');
            $imgInfoPath = $imgInfo->store('config_images', 'public');
            $config->img_info = $imgInfoPath;
        }

        if ($request->hasFile('img_info2')) {
            $imgInfo2 = $request->file('img_info2');
            $imgInfo2Path = $imgInfo2->store('config_images', 'public');
            $config->img_info2 = $imgInfo2Path;
        }

        if ($request->hasFile('img_jumbotron')) {
            $imgJumbotron = $request->file('img_jumbotron');
            $imgJumbotronPath = $imgJumbotron->store('config_images', 'public');
            $config->img_jumbotron = $imgJumbotronPath;
        }

        if ($request->hasFile('img_quote')) {
            $imgQuote = $request->file('img_quote');
            $imgQuotePath = $imgQuote->store('config_images', 'public');
            $config->img_quote = $imgQuotePath;
        }

        $config->update($request->except(['img_info', 'img_info2', 'img_jumbotron', 'img_quote']));

        return back()->with('success', 'Pengaturan berhasil diperbaharui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        // Delete the image from storage
        if (Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }

        // Delete the item from the database
        $item->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }

    public function slide_destroy($id)
    {
        $slideshow = Slideshow::findOrFail($id);

        // Delete the image from storage
        if (Storage::disk('public')->exists($slideshow->image)) {
            Storage::disk('public')->delete($slideshow->image);
        }

        // Delete the slideshow from the database
        $slideshow->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }

    public function slide_add(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imagePath = $file->store('slideshow_images', 'public');

                $item = new Slideshow();
                $item->image = $imagePath;
                $item->save();
            }
        }

        return redirect()->back()->with('success', 'Foto slideshow berhasil ditambahkan.');
    }

    public function item_add(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('item_images', 'public');
        }

        // Create a new item
        $item = new Item();
        $item->caption = $request->name;
        $item->image = $imagePath;
        $item->save();

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan.');
    }
}
