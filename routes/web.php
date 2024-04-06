<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Movies\MovieDetail;
use App\Livewire\Movies\Movies;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'index']);
Route::redirect('/', '/movies');

// Listado de peliculas reproducción actuales - Now playing
Route::get('/movies', Movies::class)->name('movies.index');

Route::get('/movies/{id}/detalles', MovieDetail::class)->name('movies.details');

// Route::get('/', function () {
//     return redirect('
//     /movies');
// });

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
