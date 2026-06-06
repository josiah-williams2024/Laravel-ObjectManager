<?php

use App\Http\Controllers\Games;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SportsController;
use Illuminate\Support\Facades\Route;

// This branch is the route playground

// 7 restfull actions: index, show, create, store, edit, update, destroy

Route::inertia('/', 'Welcome')->name('home');

// Note Controller group
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

// Item Controller Group
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('item.store');
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::patch('/items/{item}', [ItemController::class, 'update'])->name('item.update');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('item.delete');
});

// Sport Controller Group
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/sports', [SportsController::class, 'index'])->name('sports.index');
    Route::get('/sports/{sport}', [SportsController::class, 'show'])->name('sports.show');
    Route::get('/sports/create', [SportsController::class, 'create'])->name('sports.create');
    Route::post('/sports', [SportsController::class, 'store'])->name('sports.store');
    Route::get('/sports/{sports}/edit', [SportsController::class, 'edit'])->name('sports.edit');
    Route::patch('/sports', [SportsController::class, 'update'])->name('sports.update');
    Route::delete('/sports/{sport}', [SportsController::class, 'destroy'])->name('sports.destroy');
});

// Game Controller Group
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/game', [Games::class, 'index'])->name('games.index');
    Route::get('/game/{game}', [Games::class, 'show'])->name('games.show');
    Route::get('/game/create', [Games::class, 'create'])->name('game.create');
    Route::post('/game', [Games::class, 'store'])->name('game.store');
    Route::get('/game/{game}/edit', [Games::class, 'edit'])->name('game.edit');
    Route::patch('/game', [Games::class, 'update'])->name('games.update');
    Route::delete('/game', [Games::class, 'destroy'])->name('games.destroy');
});

// Car Route Group

require __DIR__.'/settings.php';
