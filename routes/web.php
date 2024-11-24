<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatieresController;
use App\Http\Controllers\EpreuvesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/service', function () {
    return view('services');
})->name('service');
Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');







// Profile routes - protected by auth middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Matieres routes with specific methods protected by auth middleware
Route::resource('matiere', MatieresController::class)->only([
    'create', 'store', 'edit', 'update', 'destroy'
])->middleware('auth');

// Epreuves routes with specific methods protected by auth middleware
Route::resource('epreuve', EpreuvesController::class)->only([
    'create', 'store', 'edit', 'update', 'destroy'
])->middleware('auth');

// Publicly accessible routes for viewing
Route::resource('matiere', MatieresController::class)->only(['index', 'show']);
Route::resource('epreuve', EpreuvesController::class)->only(['index', 'show']);

// Authentication routes (login, registration, etc.)
require __DIR__.'/auth.php';
