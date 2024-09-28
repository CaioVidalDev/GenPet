<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('vacinas', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->foreignId('animal_id')->constrained(table: 'animals');

            $table->string('laboratorio');
            $table->unsignedSmallInteger('lote')->nullable();
            $table->date('aplicacao');
            $table->date('revacinacao')->nullable();
            $table->string('observacoes')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacinas');
    }
};
