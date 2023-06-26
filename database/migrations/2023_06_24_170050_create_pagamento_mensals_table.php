<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       /* Schema::create('pagamento_mensalidade', function (Blueprint $table) {
            $table->id();
            $table->integer('mes_id');
            $table->integer('student_id');
            $table->integer('curso_id');
            $table->double('preco');
            $table->integer('classe_id');
            $table->integer('anoLectivo_id');
            $table->integer('percentagem');
            $table->integer('funcionario_id');
            $table->integer('status');
            $table->string('paymentOrder');
            $table->timestamps();
        }); */
    }

    public function down(): void
    {
        Schema::dropIfExists('pagamento_mensals');
    }
};
