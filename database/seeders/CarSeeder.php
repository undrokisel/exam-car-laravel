<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = [
            [
                'name' => 'BMW X5',
                'description' => 'Комфортный внедорожник премиум-класса',
            ],
            [
                'name' => 'Mercedes E-Class',
                'description' => 'Представительский седан бизнес-класса',
            ],
            [
                'name' => 'Audi Q7',
                'description' => 'Семиместный премиальный кроссовер',
            ],
            [
                'name' => 'Toyota Camry',
                'description' => 'Надежный бизнес-седан',
            ],
            [
                'name' => 'Lexus RX',
                'description' => 'Роскошный кроссовер премиум-класса',
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
