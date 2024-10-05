<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->foreignId('animal_id')->constrained(table: 'animals');
            $table->unsignedBigInteger('valor');
            $table->string('local')->nullable();
            $table->date('data');
            $table->string('descricao')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
