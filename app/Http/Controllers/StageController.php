<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $stages = \App\Models\Event::whereHas('eventTypes', function ($query) {
            $query->where('name', 'stage');
        })
        ->where('end_date', '>=', now())
        ->orderBy('start_date')
        ->get();

        return view('stages.index', compact('stages'));
    }

    /**
     * Display the specified resource.
     * @param \App\Models\Event $stage
     * @return \Illuminate\View\View
     */
    public function show(\App\Models\Event $stage)
    {
        // Ensure it is a stage
        if (!$stage->eventTypes->contains('name', 'stage')) {
            abort(404);
        }

        return view('stages.show', compact('stage'));
    }
}
