<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
    Route::get('/note/edit', [NoteController::class, 'edit'])->name('note.edit');
});

require __DIR__.'/settings.php';
