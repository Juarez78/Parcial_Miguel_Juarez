<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('productos', function (Blueprint $table) {
        if (!Schema::hasColumn('productos', 'stock')) {
            $table->integer('stock')->default(0);
        }
        if (!Schema::hasColumn('productos', 'precio')) {
            $table->decimal('precio', 10, 2)->default(0);
        }
        if (!Schema::hasColumn('productos', 'estado')) {
            $table->boolean('estado')->default(true);
        }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            //
        });
    }
};
