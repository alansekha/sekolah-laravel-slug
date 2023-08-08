<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publisher::factory(2)->create();
    }
}
