<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Categoria::created(['nombre' => 'Autos']);
        \App\Models\Categoria::created(['nombre' => 'Motos']);
        \App\Models\Categoria::created(['nombre' => 'Camiones']);
    }
}
