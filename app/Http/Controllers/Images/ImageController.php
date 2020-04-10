<?php

namespace App\Http\Controllers\Images;

use App\Entity\Image;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }
}
