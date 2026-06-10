<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $userID = $request->user()->id;

        $notes = Note::query()
            ->where('user_id', $userID)
            ->get();

        return Inertia::render('Dashboard', [
            'notes' => $notes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('CreateNote');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $userID = $request->user()->id;
        Note::query()->create([
            'user_id' => $userID,
            'title' => $validated['title'],
            'body' => $validated['body'],
        ]);

        return redirect()->route('note.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return Inertia::render('ViewNote', [
            'note' => $note,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return Inertia::render('UpdateNote', [
            'note' => $note,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $note->update($validated);

        return redirect()->route('note.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('note.index');
    }
}
