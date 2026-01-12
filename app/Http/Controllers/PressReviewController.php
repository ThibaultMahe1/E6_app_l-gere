<?php

namespace App\Http\Controllers;

use App\Models\PressReview;
use Illuminate\Http\Request;

class PressReviewController extends Controller
{
    public function index()
    {
        $reviews = PressReview::orderBy('date', 'desc')->get();
        return view('revue_de_presse', compact('reviews'));
    }
}
