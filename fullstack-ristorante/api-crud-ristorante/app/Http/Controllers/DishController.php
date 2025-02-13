<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        return response()->json($dishes);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'img' => 'image|max:2048',
            'ingredients' => 'required'
        ]);

        if($request->hasFile('img')){
            $validated['img'] = $request->file('img')->store('upload', 'public');
        }

        $ingredients = explode(',', $request->ingredients);

        $dish = Dish::create($validated);

        foreach($ingredients as $item){
            $dish->ingredients()->attach($item);
        }

        return response()->json($dish, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $dish = Dish::find($id);

        if(!$dish){
            return response()->json(['error' => 'Dish not found'],404);
        }

        return response()->json($dish);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
