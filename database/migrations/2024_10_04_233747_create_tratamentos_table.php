<?php

use App\Enums\Via;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tratamentos', function (Blueprint $table) {
            $table->id();

            $table->string('tipo');
            $table->foreignId('animal_id')->constrained(table: 'animals');
            $table->date('data_tratamento');
            $table->string('produto_utilizado');
            $table->unsignedSmallInteger('dosagem');
            $table->enum('via_administracao',Via::values()); 
            $table->string('veterinario_responsavel');
            $table->string('observacoes')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tratamentos');
    }
};
