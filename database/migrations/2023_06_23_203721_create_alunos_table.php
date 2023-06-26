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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('certi_hab');
            $table->string('primeiro_nome');
            $table->string('ultimo_nome');
            $table->string('contacto_id');
            $table->string('avatar');
            $table->integer('encarregado_id');
            $table->integer('pais_id');
            $table->integer('municipio_id');
            $table->integer('provincia_id');
            $table->date('data_nascimento');
            $table->string('num_bilhete');
            $table->string('num_cedula');
            $table->string('reg_id');
            $table->string('email');
            $table->string('nomePai');
            $table->string('nomeMae');
            $table->string('banned_until');
            $table->integer('status');
            $table->string('endereco');
            $table->string('genero_id');
            $table->integer('user_aluno_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }

};