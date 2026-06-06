<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
    Route::get('note/{edit}/edit', [NoteController::class, 'edit'])->name('note.edit');
    Route::get('note', [NoteController::class, 'index'])->name('note.index');
    Route::get('note/{note}', [NoteController::class, 'show'])->name('note.show');
    Route::post('note', [NoteController::class, 'store'])->name('note.store');
    Route::patch('note/{note}', [NoteController::class, 'update'])->name('note.update');
    Route::delete('/note/{note}', [NoteController::class, 'destroy'])->name('note.destroy');
});

require __DIR__.'/settings.php';
