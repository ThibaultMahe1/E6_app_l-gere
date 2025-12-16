<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\ActualiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('acceuil');
})->name('acceuil');

Route::get('/equitation-harmonique', function () {
    return view('equitation_harmonique');
})->name('equitation-harmonique');

Route::get('/projet-pedagogique', function () {
    return view('projet_pedagogique');
})->name('projet-pedagogique');

Route::get('/amenagements', function () {
    return view('amenagements');
})->name('amenagements');

Route::get('/centre-de-loisirs', function () {
    return view('centre_loisirs');
})->name('centre-de-loisirs');

Route::get('/pensions', function () {
    return view('pension');
})->name('pensions');

Route::get('/tarifs', function () {
    return view('tarifs');
})->name('tarifs');

Route::get('/cavalerie', function () {
    $chevaux = \App\Models\Horse::where('type', 'cheval')->get();
    $poneys = \App\Models\Horse::where('type', 'poney')->get();
    return view('cavalerie', compact('chevaux', 'poneys'));
})->name('cavalerie');

Route::get('/actualites', [ActualiteController::class, 'index'])->name('actualites');

Route::get('/planning', [PlanningController::class, 'index'])->name('planning');

Route::middleware('auth')->group(function () {
    Route::get('/mon-planning', [PlanningController::class, 'myPlanning'])->name('my-planning');
    Route::post('/planning/{event}/subscribe', [PlanningController::class, 'subscribe'])->name('planning.subscribe');
    Route::delete('/planning/{event}/unsubscribe', [PlanningController::class, 'unsubscribe'])->name('planning.unsubscribe');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
