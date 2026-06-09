<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userID = $request->user()->id;

        $games = Game::query()
            ->where('user_id', $userID)
            ->get();

        return Inertia::render('Game/Index', [
            'games' => $games,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Game/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'rating' => 'required',
            'price' => 'required',
        ]);

        $userID = $request->user()->id;

        Game::query()->create([
            'user_id' => $userID,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'genre' => $validated['genre'],
            'rating' => $validated['rating'],
            'price' => $validated['price'],
        ]);

        return redirect()->route('games.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return Inertia::render('Game/View', [
            'game' => $game,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return Inertia::render('Game/Edit', [
            'game' => $game,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'rating' => 'required',
            'price' => 'required',
        ]);

        $game->update($validated);

        return redirect()->route('games.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('games.index');
    }
}
