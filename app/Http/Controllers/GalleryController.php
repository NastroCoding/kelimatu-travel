<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'media.*' => 'required|file|mimes:jpeg,png,jpg,gif,webp,mp4,mov,avi,wmv',
        ]);

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $path = $file->storeAs('gallery_media', $filename, 'public');


                if (in_array($file->getClientOriginalExtension(), ['jpeg', 'png', 'jpg', 'gif', 'webp'])) {
                    $optimizerChain = OptimizerChainFactory::create();
                    $optimizerChain->optimize(storage_path('app/public/' . $path));
                }


                Gallery::create([
                    'description' => $request->description,
                    'media' => $path,
                    'created_by' => Auth::user()->id
                ]);
            }
        }

        return redirect()->back()->with('success', 'Gambar galeri berhasil ditambahkan dan dioptimalkan!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $gallery = Gallery::find($id);

        if (!$gallery) {
            return back()->with('error', 'Foto galeri tidak ditemukan!');
        }
        $filePath = storage_path('app/public/' . $gallery->media);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $gallery->delete();

        return back()->with('success', 'Foto galeri berhasil dihapus!');
    }
}
