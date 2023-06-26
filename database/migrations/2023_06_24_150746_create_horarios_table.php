<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
       /* Schema::create('horarios', function (Blueprint $table) {
            $table->id(); 
            $table->integer('disciplina_id');
            $table->integer('periodo_id');
            $table->integer('turma_id');
            $table->integer('sala_id');
            $table->integer('classe_id');
            $table->integer('anolectivo_id');
            $table->string('dia_daSemana');                                    
            $table->string('inicioDaAula');
            $table->string('terminioDaAula');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
