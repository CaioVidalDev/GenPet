<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacinaFactory extends Factory
{
    public function definition(): array
    {

        $animal = Animal::inRandomOrder()->first();

        return [
            'nome' => fake()->word(),  
            'animal_id' => $animal->id,

            'laboratorio' => fake()->name(),
            'lote' => fake()->numberBetween(1, 1000),
            'aplicacao' => fake()->date(),
            'revacinacao' => fake()->date(),
            'observacoes' => fake()->text(),  


        ];
    }
}
