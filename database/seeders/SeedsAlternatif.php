<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelAlternatif;

class SeedsAlternatif extends Seeder
{
    public function run(): void
    {
        ModelAlternatif::factory()->count(5)->create();
    }
}
