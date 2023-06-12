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
        Schema::create('imputaciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecImp');
            $table->decimal('impChqImp', 12,2)->nullable();
            $table->unsignedBigInteger('fac_id')->nullable();
            $table->unsignedBigInteger('chq_id')->nullable();
            $table->decimal('impChq', 12, 2)->nullable();
            $table->decimal('impFac', 12, 2)->nullable();

            $table->foreign('fac_id')->references('id')->on('facturas')->onDelete('set null');
            $table->foreign('chq_id')->references('id')->on('cheques')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imputaciones');
    }
};
