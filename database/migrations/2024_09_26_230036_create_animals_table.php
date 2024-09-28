<?php

use App\Enums\Porte;
use App\Enums\Sexo;
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
            $table->date('nascimento');

            $table->string('especie');
            $table->enum('porte',Porte::values()); 

            $table->string('raca');
            $table->string('pelagem');
            $table->enum('sexo', Sexo::values()); 
            $table->string('microship')->nullable();

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
