<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelKaryawan;

class SeedsKaryawan extends Seeder
{
    public function run(): void
    {
        ModelKaryawan::factory()->count(5)->create();
    }
}
