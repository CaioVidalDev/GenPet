<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\GuardiaoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacinaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->resource('guardiaos', GuardiaoController::class)
    ->except(['store', 'update', 'delete']);

Route::middleware(['auth', 'verified'])->resource('animals', AnimalController::class)
    ->except(['store', 'update', 'delete']);

Route::middleware(['auth', 'verified'])->resource('vacinas', VacinaController::class)
    ->except(['store', 'update', 'delete']);

require __DIR__.'/auth.php';
