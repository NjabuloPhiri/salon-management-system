<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('services')->insert([
            [
                'name' => 'Nails',
                'price' => 1500.00,
            ],
            [
                'name' => 'Hairstyles',
                'price' => 800.00,
            ],
            [
                'name' => 'Hair Products',
                'price' => 500.00,
            ],
        ]);
    }
}
