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
       \App\Models\Proveedor::create([
        'nombre' => 'Proveedor 1',
        'telefono' => '2222-3333',
        'estado' => true]);
       \App\Models\Proveedor::create([
        'nombre' => 'Proveedor 2',
        'telefono' => '2222-3233',
        'estado' => true]);
       \App\Models\Proveedor::create([
        'nombre' => 'Proveedor 3',
        'telefono' => '2222-3333',
        'estado' => true]);
    }
}
