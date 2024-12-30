<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModelLaporanFactory extends Factory
{
    private static $idKaryawanCounter = 1;

    public function definition(): array
    {
        $fake = fake('id_ID');

        return [
            'id_akun' => self::$idKaryawanCounter,
            'id_karyawan' => self::$idKaryawanCounter++,
            'tanggal' => fake()->date(),
            'file' => fake()->text(20),
        ];
    }
}
