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
        Schema::create('examenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('laboratorio_id');
            $table->string('tipo');
            $table->string('precio');
            $table->date('fecha_solicitud');
            $table->text('requisitos');
            $table->enum('estado', ['pendiente', 'completado'])->default('pendiente');
            $table->timestamps();
            
            $table->foreign('paciente_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('laboratorio_id')->references('id')->on('laboratorios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examenes');
    }
};
