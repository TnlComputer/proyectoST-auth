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
        Schema::create('movimiento_ocs', function (Blueprint $table) {
            $table->id();

            $table->date('fecMov');
            $table->double('nroOc',12);
            $table->double('remitoK',20);
            $table->unsignedBigInteger('oc_id')->nullable();
            $table->double('nroFac', 20);
            $table->double('cantFac', 12)->nullable();
            $table->double('remST', 20)->nullable();
            $table->unsignedBigInteger('remk_id')->nullable();
            $table->unsignedBigInteger('fac_id')->nullable();

            $table->foreign('oc_id')->references('id')->on('ocompras')->onDelete('set null');
            $table->foreign('remk_id')->references('id')->on('remitoks')->onDelete('set null');
            $table->foreign('fac_id')->references('id')->on('facturas')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimiento_ocs');
    }
};
