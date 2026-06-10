<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userID = $request->user()->id;

        $cars = Car::query()
            ->where('user_id', $userID)
            ->get();

        return Inertia::render('Car/Index', [
            'cars' => $cars,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Car/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'mileage' => 'required',
            'price' => 'required',
        ]);

        $userID = $request->user()->id;

        Car::query()->create([
            'user_id' => $userID,
            'brand' => $validated['brand'],
            'model' => $validated['model'],
            'mileage' => $validated['mileage'],
            'price' => $validated['price'],
        ]);

        return redirect()->route('car.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return Inertia::render('Car/View', [
            'car' => $car,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return Inertia::render('Car/Edit', [
            'car' => $car,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'mileage' => 'required',
            'price' => 'required',
        ]);

        $car->update($validated);

        return redirect()->route('car.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('car.index');
    }
}
