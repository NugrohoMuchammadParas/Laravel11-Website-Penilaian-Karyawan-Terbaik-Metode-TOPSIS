<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelAkun;

class SeedsAkun extends Seeder
{
    public function run(): void
    {
        ModelAkun::factory()->count(5)->create();
    }
}
