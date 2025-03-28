<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('contacts', [contactController::class, 'index'])->name('contact.index');
    Route::get('contacts/create', [contactController::class, 'create'])->name('contact.create');
    Route::post('contacts', [contactController::class, 'store'])->name('contact.store');
    Route::get('contacts/{contact}/edit', [contactController::class, 'edit'])->name('contact.edit');
    Route::post('contacts/{contact}', [contactController::class, 'update'])->name('contact.update');
    Route::delete('contacts/{contact}', [contactController::class, 'destroy'])->name('contact.destroy');
});

require __DIR__.'/auth.php';
