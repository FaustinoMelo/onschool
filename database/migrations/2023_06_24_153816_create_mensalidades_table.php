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
        Schema::create('mensalidades', function (Blueprint $table) {
            $table->id(); 
            $table->double('valorPago');
            $table->double('saldoLimiteAnual'); 
            $table->double('totalPago'); 
            $table->integer('classe_id'); 
            $table->integer('curso_id'); 
            $table->double('desconto');
            $table->integer('mes_id'); 
            $table->string('status'); 
            $table->integer('anoLectivo_id'); 
            $table->timestamps(); 
        }); 
    } 

    public function down(): void
    {
        Schema::dropIfExists('mensalidades');
    }
};
