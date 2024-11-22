<?php

namespace Database\Seeders;

use App\Models\CollectionPoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CollectionPoint::factory(5)->create();
    }
}
