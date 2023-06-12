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
        Schema::create('cheques', function (Blueprint $table) {
            $table->id();

            $table->string('nroChq', 20);
            $table->date('fecChq');
            $table->decimal('impChq', 12, 2);
            $table->string('bancoChq', 100);
            $table->string('cobrado', 12)->nullable();
            $table->decimal('gastos', 12, 2)->nullable();
            $table->string('obsChq')->nullable();
            $table->string('imputado', 1)->nullable();
            $table->decimal('impSaldo', 20, 2)->nullable();
            $table->string('depositado', 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheques');
    }
};
