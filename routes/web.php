<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    Route::get('dashboar/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('dashboar/notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('dashboar/notes', [NoteController::class, 'store'])->name('notes.store');
});

require __DIR__.'/settings.php';
