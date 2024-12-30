<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModelKriteriaFactory extends Factory
{
    private static $idKaryawanCounter = 1;

    public function definition(): array
    {
        $fake = fake('id_ID');

        return [
            'id_akun' => self::$idKaryawanCounter++,
            'kriteria' => fake()->randomElement(['kinerja', 'komunikasi', 'kerjasama', 'kreativitas', 'disiplin']),
            'keterangan' => fake()->text(20),
            'bobot' => fake()->numberBetween(1, 5),
        ];
    }
}
