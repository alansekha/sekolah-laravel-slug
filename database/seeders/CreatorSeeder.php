<?php

namespace Database\Seeders;

use App\Models\Creator;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Creator::factory(2)->create();
    }
}
