<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('date', 'desc')->get();
        return view('galeries.index', compact('galleries'));
    }

    public function show(Gallery $gallery)
    {
        $photos = $gallery->photos;
        return view('galeries.show', compact('gallery', 'photos'));
    }
}
