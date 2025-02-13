<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class RelationshipController extends Controller
{
    public function dishIngredients($id){
        $dish = Dish::with('ingredients')->find($id);
        return response ()->json([
            'dish' => $dish,
            'ingredients' => $dish->ingredients,
        ]);
    }
}
