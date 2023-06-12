<?php

namespace Database\Seeders;

use App\Models\Reel;
use Illuminate\Database\Seeder;

class ReelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reel::factory()->count(1000)->create();
    }
}
