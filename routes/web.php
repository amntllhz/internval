<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::get('/', function () {
    return view('start');
});

Route::get('/home', function () {
    return view('home');
});

// submission
Route::get('/submission', [FrontendController::class, 'showForm'])->name('submission.form');
Route::post('/submission', [FrontendController::class, 'submitForm'])->name('submission.submit');
Route::get('/submission/success/{id}', [FrontendController::class, 'success'])->name('submission.success');

// tracking
Route::get('/tracking', [FrontendController::class, 'showTrackingForm'])->name('tracking.form');
Route::post('/tracking', [FrontendController::class, 'track'])->name('tracking.result');
