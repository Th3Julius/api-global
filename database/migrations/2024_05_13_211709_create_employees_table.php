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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre');
            $table->string('otros_nombres')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('sede');
            $table->string('tipo_id');
            $table->string('numero_id')->unique();
            $table->string('email')->unique();
            $table->string('area');
            $table->string('estado');
            $table->string('fechahora_registro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
