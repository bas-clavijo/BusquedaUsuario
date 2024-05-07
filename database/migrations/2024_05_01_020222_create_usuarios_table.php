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
            $table->string("nombre");
            $table->string("correo")->unique();
            $table->string("contraseña");
            $table->string("confirmarcorreo")->nullable(); // Nuevo campo
            $table->string("cargo")->nullable(); // Nuevo campo
            $table->string("confirmarcontraseña")->nullable(); // Nuevo campo
            $table->longText("foto")->nullable();
            $table->boolean("estado")->default(true);
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
