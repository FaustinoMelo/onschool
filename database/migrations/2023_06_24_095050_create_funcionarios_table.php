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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('formacao_academica');
            $table->string('grau_academico');
            $table->integer('n_carteira');
            $table->string('primeiro_nome');
            $table->string('ultimo_nome');
            $table->integer('contacto_id');
            $table->string('avatar');
            $table->integer('pais_id');
            $table->integer('municipio_id');
            $table->integer('provincia_id');
            $table->date('data_nascimento');
            $table->string('num_bilhete');
            $table->string('nif');
            $table->string('cargo_id');
            $table->string('email');
            $table->string('banned_until');
            $table->integer('status');
            $table->string('endereco');
            $table->string('genero_id');
            $table->string('iban');
            $table->string('user_id');
            $table->string('user_funcionario_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
