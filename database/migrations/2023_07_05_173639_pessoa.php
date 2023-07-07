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
        Schema::create('pessoa', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('contacto_id');
            $table->string('avatar');
            $table->string('pais');
            $table->integer('municipio_id')->nullable();
            $table->integer('provincia_id')->nullable();
            $table->date('data_nascimento');
            $table->string('num_bilhete')->nullable();
            $table->string('num_cedula')->nullable();
            $table->string('bairro');
            $table->integer('n_passaport');
            $table->integer('genero_id');
            $table->integer('user_funcionario_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
