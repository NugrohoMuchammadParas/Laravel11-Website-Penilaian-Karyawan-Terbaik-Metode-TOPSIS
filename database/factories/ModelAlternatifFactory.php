<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModelAlternatifFactory extends Factory
{
    private static $idKaryawanCounter = 1;

    public function definition(): array
    {
        $fake = fake('id_ID');

        return [
            'id_akun' => self::$idKaryawanCounter,
            'id_karyawan' => self::$idKaryawanCounter++,
            'kinerja' => fake()->numberBetween(1, 5),
            'komunikasi' => fake()->numberBetween(1, 5),
            'kerjasama' => fake()->numberBetween(1, 5),
            'kreativitas' => fake()->numberBetween(1, 5),
            'disiplin' => fake()->numberBetween(1, 5),
        ];
    }
}
