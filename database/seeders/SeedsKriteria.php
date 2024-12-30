<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelKriteria;

class SeedsKriteria extends Seeder
{
    public function run(): void
    {
        ModelKriteria::factory()->count(5)->create();
    }
}
