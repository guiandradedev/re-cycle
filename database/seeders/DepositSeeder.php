<?php

namespace Database\Seeders;

use App\Models\Deposit;
use App\Models\Deposits;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Deposit::factory(5)->create();
    }
}
