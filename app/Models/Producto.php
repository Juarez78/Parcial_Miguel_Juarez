<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

use App\Models\Marca;
use App\Models\Proveedor;
class Producto extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre', 'precio', 'stock', 'marca_id', 'proveedor_id', 'estado',];

    public function marca() {
        return $this->belongsTo(Marca::class);
    }

    public function proveedor() {
        return $this->belongsTo(Proveedor::class);
    }
}