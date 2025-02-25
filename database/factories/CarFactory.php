<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        $carBrands = ['BMW', 'Mercedes', 'Audi', 'Toyota', 'Honda', 'Lexus'];
        $carModels = ['Седан', 'Кроссовер', 'Внедорожник', 'Купе'];

        return [
            'name' => $this->faker->randomElement($carBrands) . ' ' .
                $this->faker->randomElement($carModels),
            'description' => $this->faker->sentence(3),
        ];
    }
}
