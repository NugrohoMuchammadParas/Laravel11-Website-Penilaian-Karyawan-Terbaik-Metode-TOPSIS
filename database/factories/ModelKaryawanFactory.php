<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModelKaryawanFactory extends Factory
{
    private static $idKaryawanCounter = 1;

    public function definition(): array
    {
        $fake = fake('id_ID');

        return [
            'id_akun' => self::$idKaryawanCounter++,
            'nama' => $fake->name(),
            'lahir' => fake()->date(),
            'telepon' => $fake->phoneNumber(),
            'email' => $fake->email(),
            'alamat' => $fake->address(),
        ];
    }
}
