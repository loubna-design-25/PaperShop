<?php

namespace Database\Factories;

use App\Models\Producte;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Producte>
 */
class ProducteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(),
            'descripcio' => $this->faker->sentence(),
            'preu' => $this->faker->randomFloat(2, 1, 100),
            'quantitat' => $this->faker->numberBetween(1, 100),
            'imatge' => $this->faker->imageUrl(640, 480, 'products', true),
        ];
    }
}
