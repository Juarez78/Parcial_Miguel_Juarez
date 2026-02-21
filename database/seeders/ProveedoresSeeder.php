<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       \App\Models\Proveedor::created(['nombre' => 'Proveedor 1']);
       \App\Models\Proveedor::created(['nombre' => 'Proveedor 2']);
       \App\Models\Proveedor::created(['nombre' => 'Proveedor 3']);
    }
}
