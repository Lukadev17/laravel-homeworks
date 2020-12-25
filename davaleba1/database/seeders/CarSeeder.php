<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->car('Bmw', 'X5', 'Black', 440, 3500);
        $this->car('Mercedes', 'E-class', 'blue', 320, 4200);
        $this->car('Toyota', 'Camry', 'white', 250, 5600);
        $this->car('Volkswagen', 'Jetta', 'Red', 180, 3500);
        $this->car('Audi', 'A6', 'grey', 350, 7000);
        $this->car('Lamborghini', 'Aventador', 'yellow', 630, 30000);
        $this->car('Maserati', 'granturismo', 'Black', 440, 37550);
    }
    public function car($manufacturer, $model, $color, $engine, $price)
    {
        DB::table('cars')->insert([
            'manufacturer' => $manufacturer,
            'model' => $model,
            'color' => $color,
            'engine' => $engine,
            'price' => $price
        ]);
    }
}
