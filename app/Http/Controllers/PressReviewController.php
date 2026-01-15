<?php

namespace App\Http\Controllers;

use App\Models\PressReview;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PressReviewController extends Controller
{
    public function index(): View
    {
        $reviews = PressReview::orderBy('date', 'desc')->get();
        return view('revue_de_presse', compact('reviews'));
    }
}
