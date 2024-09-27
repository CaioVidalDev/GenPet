<?php

namespace Database\Factories;

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

            'especie' => fake()->name(),  //randomElement(['Cão', 'Gato', 'Pássaro']), 
            'raca' => fake()->word(),  
            'cor' => fake()->colorName(),  
            'porte' => fake()->word(), //randomElement(['Pequeno', 'Médio', 'Grande']),  
            'nascimento' => fake()->date(),  
            'sexo' => fake()->word(),  //randomElement(['M', 'F']), 
            'observacoes' => fake()->sentence(),  
 
        ];
    }
}
