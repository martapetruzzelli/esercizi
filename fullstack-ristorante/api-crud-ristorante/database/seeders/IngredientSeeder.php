<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = ["pasta", "tomato", "salad", "chicken", "rice", "mushroom", "oil", "salt"];

        foreach($ingredients as $item){
            Ingredient::create([
                "name" => $item
            ]);
        }
    }
}
