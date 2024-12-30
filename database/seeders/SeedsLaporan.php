<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelLaporan;

class SeedsLaporan extends Seeder
{
    public function run(): void
    {
        ModelLaporan::factory()->count(5)->create();
    }
}
