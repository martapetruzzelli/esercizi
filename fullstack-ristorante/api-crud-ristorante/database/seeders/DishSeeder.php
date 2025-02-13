<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Support\Facades\DB;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dishes = [
            [
            "name" => "Tomato Pasta",
            "description" => "pasta with tomato sauce",
            "price" => 5,
            "available" => 1,
            "img" => "C:\laragon\www\img\sugo.jpg"
            ],
            [
                "name" => "Caesar salad",
                "description" => "salad with grilled chicken",
                "price" => 3,
                "available" => 0,
                "img" => "C:\laragon\www\img\caesar.jpg"
            ],
            [
                "name" => "Mushroom risotto",
                "description" => "creamy risotto with mushroom",
                "price" => 7,
                "available" => 1,
                "img" => "C:\laragon\www\img\risotto.jpg"
                ],
            ];

        $ingredients = Ingredient::all();

        foreach($dishes as $dish){
            $dish = Dish::create([
                "name" => $dish['name'],
                "description" => $dish['description'],
                "price" => $dish['price'],
                "available" => $dish['available'],
                "img" => $dish['img'],
            ]);

            $dishIngredients = $ingredients->random(rand(1, 8));

            foreach($dishIngredients as $ingredient){
                $dish->ingredients()->attach($ingredient->id);
            }

        }
    }
}
