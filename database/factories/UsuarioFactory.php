<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password(),
            'persona_id' => fake()->randomNumber(),
            'created_at' => fake()->date_create(),
            'updated_at' => fake()->date(),
        ];
    }
}
