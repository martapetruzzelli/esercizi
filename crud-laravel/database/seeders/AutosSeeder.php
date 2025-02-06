<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $autos = [
            [

                    "id"=> 1,
                    "marca"=> "Fiat",
                    "modello"=> "Panda",
                    "prezzo"=> 15000,
                    "created_at"=> now(),
                    "updated_at" => now()
            ],
            [
                    "id"=> 2,
                    "marca"=> "Volkswagen",
                    "modello"=> "Golf",
                    "prezzo"=> 25000,
                    "created_at"=> now(),
                    "updated_at" => now()
                    ],
                    [
                    "id"=> 3,
                    "marca"=> "Toyota",
                    "modello"=> "Yaris",
                    "prezzo"=> 20000,
                    "created_at"=> now(),
                    "updated_at" => now()
                    ],
                    [
                    "id"=> 4,
                    "marca"=> "Ford",
                    "modello"=> "Fiesta",
                    "prezzo"=> 18000,
                    "created_at"=> now(),
                    "updated_at" => now()
                    ],
                    [
                    "id"=> 5,
                    "marca"=> "BMW",
                    "modello"=> "Serie 3",
                    "prezzo"=> 40000,
                    "created_at"=> now(),
                    "updated_at" => now()

            ]
      ];
      DB::table("autos")->insert($autos);
    }
}
