<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function show($id)
    {
        $gallery = Gallery::with('images')->findOrFail($id);

        return view('front.gallery.show', compact('gallery'));
    }
}
