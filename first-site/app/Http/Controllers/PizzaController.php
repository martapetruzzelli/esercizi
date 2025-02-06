<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    //
    public function index(){
        $pizzas = Pizza::all();
        return view("pages.pizze",compact("pizzas"));
    }

    public function availablePizzas(){
        $pizzas = Pizza::all()->where('available', 1);
        return view('pages.pizze', compact('pizzas'));
    }
}
