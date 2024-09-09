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
        Schema::create('compras_detalles', function (Blueprint $table) {
            $table->id('_id');
            $table->tinyInteger('compra_id');
            $table->tinyInteger('product_id');
            $table->double('qty', 8, 2);
            $table->double('price', 8, 2);
            $table->double('total', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras_detalles');
    }
};
