<?php

namespace Database\Factories;

use App\Enums\Especie;
use App\Enums\Porte;
use App\Enums\Sexo;
use App\Models\Guardiao;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{

    public function definition(): array
    {

        $guadiao = Guardiao::inRandomOrder()->first();

        return [
            'nome' => fake()->firstName(),
            'guardiao_id' => $guadiao->id,
            'nascimento' => fake()->date(),

            'especie' => fake()->randomElement(Especie::values()),
            'porte' => fake()->randomElement(Porte::values()),

            'raca' => fake()->word(),  
            'pelagem' => fake()->colorName(),  
            'sexo' => fake()->randomElement(Sexo::values()),

            'microship' => fake()->sentence(),  
            'observacoes' => fake()->text(),  
 
        ];
    }
}
