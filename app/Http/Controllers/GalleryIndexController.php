<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $galleries = Gallery::orderBy('created_at', 'asc')->paginate(12);
        return view('galleryIndex', compact('galleries'));
    }
}
