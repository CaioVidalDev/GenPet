<?php

namespace Database\Factories;

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
            'nascimento' => fake()->date(),

            'especie' => fake()->name(),
            'porte' => fake()->randomElement(Porte::values()),

            'raca' => fake()->word(),  
            'pelagem' => fake()->colorName(),  
            'sexo' => fake()->randomElement(Sexo::values()),

            'microship' => fake()->sentence(),  
            'observacoes' => fake()->text(),  
 
        ];
    }
}
