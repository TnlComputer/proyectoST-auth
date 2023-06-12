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
        Schema::create('remitoks', function (Blueprint $table) {
            $table->id();

            $table->double('nroRemK', 12);
            $table->double('cantRemK', 12);
            $table->double('ocompra', 12)->nullable();
            $table->date('fecRemK');
            $table->double('cantUsada', 12)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('oc_id')->nullable();
            
            $table->foreign('oc_id')->references('id')->on('ocompras')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remitoks');
    }
};
