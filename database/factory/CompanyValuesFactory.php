<?php

namespace Database\Factories;

use App\Models\CompanyValues;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CompanyValues>
 */
class CompanyValuesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' => fake()->randomElement(['accountability', 'reliability', 'breakthrough', 'ownership']),
            'title' => fake()->words(2, true),
            'description' => fake()->sentence(),
            'icon_image' => null,
        ];
    }
}
