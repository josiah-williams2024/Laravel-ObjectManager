<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userID = $request->user()->id;

        $items = Item::query()
            ->where('user_id', $userID)
            ->get(); // Do not forget to use (get()) get the collection of items

        return Inertia::render('ItemPages/ItemIndex', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('ItemPages/CreateItem');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'Description' => 'required',
            'price' => 'required',
        ]);

        $userId = $request->user()->id;

        Item::query()->create([
            'user_id' => $userId,
            'title' => $validated['title'],
            'Description' => $validated['Description'],
            'price' => $validated['price'],
        ]);

        return redirect()->route('items.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return Inertia::render('ItemPages/ViewItem', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return Inertia::render('ItemPages/UpdateItem', [
            'items' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'title' => 'required',
            'Description' => 'required',
            'price' => 'required',
        ]);

        $item->update($validated);

        return redirect()->route('items.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index');

    }
}
