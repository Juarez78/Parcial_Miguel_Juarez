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
        \App\Models\Marca::created(['nombre' => 'Nissan']);
        \App\Models\Marca::created(['nombre' => 'Toyota']);
        \App\Models\Marca::created(['nombre' => 'Volkswagen']);
    }
}
