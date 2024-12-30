<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModelAkunFactory extends Factory
{
    public function definition(): array
    {
        $fake = fake('id_ID');

        return [
            'username' => $fake->firstName(),
            'password' => $fake->password(),
            'nama' => $fake->name(),
            'file' => fake()->randomElement(['default.png', 'default.png']),
            'level' => fake()->randomElement(['admin', 'user']),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
