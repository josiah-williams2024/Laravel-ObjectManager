<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    Route::get('dashboar/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('dashboar/notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('dashboar/notes', [NoteController::class, 'store'])->name('notes.store');
    Route::get('dashboard/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('dashboard/{note}', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('dashboard/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
});

require __DIR__.'/settings.php';
