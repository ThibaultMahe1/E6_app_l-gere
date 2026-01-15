<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\PressReviewController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TarifController;

use App\Http\Controllers\StageController;

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

Route::get('/tarifs', [TarifController::class, 'index'])->name('tarifs');

Route::get('/cavalerie', function () {
    $chevaux = \App\Models\Horse::where('type', 'cheval')->get();
    $poneys = \App\Models\Horse::where('type', 'poney')->get();
    return view('cavalerie', compact('chevaux', 'poneys'));
})->name('cavalerie');

Route::get('/actualites', [ActualiteController::class, 'index'])->name('actualites');

Route::get('/planning', [PlanningController::class, 'index'])->name('planning');

Route::get('/plan-dacces', function () {
    return view('plan_acces');
})->name('plan-dacces');

Route::get('/stages', [StageController::class, 'index'])->name('stages.index');
Route::get('/stages/{stage}', [StageController::class, 'show'])->name('stages.show');

Route::get('/nous-contacter', function () {
    return view('contact');
})->name('nous-contacter');


Route::get('/revue-de-presse', [PressReviewController::class, 'index'])->name('revue-de-presse');

Route::get('/galeries', [GalleryController::class, 'index'])->name('galeries.index');
Route::get('/galeries/{gallery}', [GalleryController::class, 'show'])->name('galeries.show');

Route::middleware('auth')->group(function () {
    Route::get('/mon-planning', [PlanningController::class, 'myPlanning'])->name('my-planning');
    Route::post('/planning/{event}/subscribe', [PlanningController::class, 'subscribe'])->name('planning.subscribe');
    Route::delete('/planning/{event}/unsubscribe', [PlanningController::class, 'unsubscribe'])->name('planning.unsubscribe');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
