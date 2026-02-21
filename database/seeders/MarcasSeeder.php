<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Marca::create(['nombre' => 'Nissan']);
        \App\Models\Marca::create(['nombre' => 'Toyota']);
        \App\Models\Marca::create(['nombre' => 'Volkswagen']);
    }
}
