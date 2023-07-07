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
            $table->string('doc_certi_hab')->nullable();
            $table->string('doc_identificacao');
            $table->integer('n_estudate')->unique();
            $table->string('primeiro_nome');
            $table->string('ultimo_nome');
            $table->string('nomePai')->nullable();
            $table->string('nomeMae')->nullable();
            $table->string('banned_until');
            $table->integer('status');
            $table->integer('pessoa_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }
   
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }

};