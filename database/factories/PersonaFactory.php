<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'primernombre' => fake()->firstName(),
            'segundonombre' => fake()->name(),
            'primerapellido' => fake()->lastname(),
            'segundoapellido' => fake()->lastName(),
            'fecha_nacimiento' => fake()->date(),
            'email' => fake()->unique()->safeEmail(),
            'telefono' => fake()->phoneNumber(),
            'direccion' => fake()->address(),
            'created_at' => fake()->date_create(),
            'updated_at' => fake()->date(),
        ];
    }
}