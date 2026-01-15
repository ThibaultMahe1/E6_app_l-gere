<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::orderBy('date', 'desc')->get();
        return view('galeries.index', compact('galleries'));
    }

    public function show(Gallery $gallery): View
    {
        $photos = $gallery->photos;
        return view('galeries.show', compact('gallery', 'photos'));
    }
}
