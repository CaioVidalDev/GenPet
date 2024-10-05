<?php

namespace Database\Factories;

use App\Enums\Via;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;


class TratamentoFactory extends Factory
{
    
    public function definition(): array
    {
        $animal = Animal::inRandomOrder()->first();

        return [

            'tipo' => fake()->name(),
            'animal_id' => $animal->id,
            'data_tratamento' => fake()->date(),
            'produto_utilizado' => fake()->word(),
            'dosagem' => fake()->numberBetween(1, 100),
            'via_administracao' => fake()->randomElement(Via::values()),
            'veterinario_responsavel' => fake()->name(),
            'observacoes' => fake()->text(), 
        
        ];
    }
}
