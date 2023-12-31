<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Cargo_Colaborador', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cargo_id')->constrained('cargos');
            $table->foreignId('colaborador_id')->constrained('colaboradores');
            $table->integer('nota_desempenho');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cargo_Colaborador');
    }
};
