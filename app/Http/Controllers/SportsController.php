<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $sports = Sport::query()
            ->where('user_id', $userId)
            ->get();

        return Inertia::render('Sport/Index', [
            'sports' => $sports,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Sport/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'skill-level' => 'required',
        ]);

        $userID = $request->user()->id;

        Sport::query()->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'skill-level' => $validated['skill-level'],
            'user_id' => $userID,
        ]);

        return redirect()->route('sports.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        return Inertia::render('Sport/ViewSport', [
            'sport' => $sport,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport)
    {
        return Inertia::render('Sport/Edit', [
            'sport' => $sport,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sport $sport)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'skill-level' => 'required',
        ]);

        $sport->update($validated);

        return redirect()->route('sports.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        $sport->delete();

        return redirect()->route('sports.index');
    }
}
