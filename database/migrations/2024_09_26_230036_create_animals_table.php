<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();

            $table->string('nome');

            $table->foreignId('guardiao_id')->constrained(table: 'guardiaos');

            $table->string('especie');
            $table->string('raca');
            $table->string('cor');
            $table->string('porte');
            $table->date('nascimento');
            $table->string('sexo');
            $table->string('observacoes')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
