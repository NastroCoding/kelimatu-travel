<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function isPortrait()
    {
        $mediaPath = Storage::path($this->media);

        // Check if the file is an image
        if (strpos(mime_content_type($mediaPath), 'image') !== false) {
            $imageSize = getimagesize($mediaPath);
            return $imageSize[0] < $imageSize[1];
        }

        // For videos or non-image files, assume it's not portrait
        return false;
    }
}
