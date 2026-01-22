<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckFromStart;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\VerifySubmissionController;

// start
Route::get('/', [FrontendController::class, 'start'])->name('start');

// verify
Route::get('/verify/{id}', [VerifySubmissionController::class, 'showVerify'])
    ->name('submission.verify');

// session mahasiswa
Route::get('/mahasiswa-redirect', function () {
    session()->put('flow.start_passed', true);
    return redirect('/home');
})->name('mahasiswa.redirect');


// middleware
Route::middleware([CheckFromStart::class])->group(function () {

    // home
    Route::get('/home', function () {
        return view('home');
    });

    // submission
    Route::get('/submission', [FrontendController::class, 'showForm'])->name('submission.form');
    Route::post('/submission', [FrontendController::class, 'submitForm'])->name('submission.submit');
    Route::get('/submission/success/{id}', [FrontendController::class, 'success'])->name('submission.success');
    Route::get('/submission/delete/{id}', [FrontendController::class, 'deleteSubmission'])->name('submission.delete');

    // tracking
    Route::get('/tracking', [FrontendController::class, 'showTrackingForm'])->name('tracking.form');
    Route::post('/tracking', [FrontendController::class, 'track'])->name('tracking.result'); 

});


// data wilayah
Route::get('/get-kabupaten', [\App\Http\Controllers\WilayahController::class, 'getKabupaten']);
Route::get('/get-kecamatan', [\App\Http\Controllers\WilayahController::class, 'getKecamatan']);
Route::get('/get-desa', [\App\Http\Controllers\WilayahController::class, 'getDesa']);


