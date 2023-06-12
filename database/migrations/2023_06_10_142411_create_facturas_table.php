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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->double('nroOC', 12)->nullable();
            $table->date('fecFac');
            $table->string('nroFac', 12);
            $table->double('remK', 12)->nullable();
            $table->double('remST', 12)->nullable();
            $table->double('cantFac', 12);
            $table->decimal('impFac', 12, 2);
            $table->decimal('pagado', 12,2)->nullable();
            $table->string('imputado', 1)->nullable();
            $table->string('fondo', 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
