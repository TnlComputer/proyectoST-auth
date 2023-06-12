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
        Schema::create('linea_facs', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->double('linea', 2);
            $table->double('cantFac', 12)->nullable();
            $table->decimal('impFac', 12)->nullable();
            $table->double('remST', 12)->nullable();
            $table->unsignedBigInteger('fac_id')->nullable();
            $table->unsignedBigInteger('oc_id')->nullable();
            $table->unsignedBigInteger('remk_id')->nullable();

            $table->foreign('fac_id')->references('id')->on('facturas')->onDelete('set null');
            $table->foreign('oc_id')->references('id')->on('ocompras')->onDelete('set null');
            $table->foreign('remk_id')->references('id')->on('remitoks')->onDelete('set null');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linea_facs');
    }
};
