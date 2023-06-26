<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
       /* $table->id();
        $table->string('name');
        $table->string('formacao_academica');
        $table->string('grau_academico');
        $table->integer('n_carteira');
        $table->string('primeiro_nome');
        $table->string('ultimo_nome');
        $table->string('contacto_id');
        $table->string('avatar');
        $table->integer('pais');
        $table->integer('municipio_id');
        $table->integer('provincia_id');
        $table->date('data_nascimento');
        $table->string('num_passaport');
        $table->string('num_bilhete');
        $table->string('email');
        $table->integer('status');
        $table->string('endereco');
        $table->string('genero_id');
        $table->integer('user_professor_id')->nullable();
        $table->integer('user_id');
        $table->softDeletes();
        $table->timestamps();*/
    }

    public function down(): void
    {
        Schema::dropIfExists('professors');

    }

};
