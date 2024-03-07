<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Chirp;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

/*
DB::listen(function ($query){
    dump($query->sql);
});
*/

Route::view('/', 'welcome')->name('welcome');


// rutas para el acceso


Route::middleware('auth')->group(function () {

    //rutas del login
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //rutas del crud chirps
    Route::get('/chirps', [ChirpController::class, 'index'])->name('chirps.index');
    Route::post('/chirps', [ChirpController::class, 'store'])->name('chirps.store');
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit'])->name('chirps.edit');
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update'])->name('chirps.update');
    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy'])->name('chirps.destroy');

    //pdf
    Route::get('/reportechirps',[ChirpController::class, 'reportechirps'])->name('chirppdf.pdf');
});

require __DIR__.'/auth.php';
