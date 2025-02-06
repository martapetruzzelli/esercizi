<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PizzasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $pizzas = [
            [
                "flavor"=> "Margherita",
                "description"=> "pomodoro e mozzarella",
                "price"=> 5,
                "available"=> 1,
                "created_at"=> now(),
                "updated_at"=> now()
            ],
            [
                "flavor"=> "Diavola",
                "description"=> "pomodoro e mozzarella e salamino piccante",
                "price"=> 1,
                "available"=> 1,
                "created_at"=> now(),
                "updated_at"=> now()
            ],
            [
                'flavour' => 'Pepperoni',
                'description' => 'Pizza topped with pepperoni slices and mozzarella cheese',
                'price' => 9,
                'available' => 1,
                "created_at"=> now(),
                "updated_at"=> now()
            ]
        ];
        DB::table("pizzas")->insert($pizzas);
    }
}
