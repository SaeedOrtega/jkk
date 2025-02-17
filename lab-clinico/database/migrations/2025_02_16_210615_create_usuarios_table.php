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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('ci');
            $table->string('celular');
            $table->string('nombre_usuario')->unique();
            $table->string('password');
            $table->unsignedBigInteger('laboratorio_id')->nullable();
            $table->foreign('laboratorio_id')->references('id')->on('laboratorios')->onDelete('set null');
            $table->enum('rol', ['paciente', 'laboratorista', 'administrador']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
