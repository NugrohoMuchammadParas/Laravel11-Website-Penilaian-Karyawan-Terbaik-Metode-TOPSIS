<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ModelAkun;
use App\Models\ModelAlternatif;
use App\Models\ModelKaryawan;
use App\Models\ModelKriteria;
use App\Models\ModelLaporan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        ModelAkun::factory()->count(5)->create();

        ModelKaryawan::factory()->count(5)->create();

        ModelAlternatif::factory()->count(5)->create();

        ModelKriteria::factory()->count(5)->create();

        ModelLaporan::factory()->count(5)->create();
    }
}
