<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicoFactory extends Factory
{
   
    public function definition(): array
    {
        $animal = Animal::inRandomOrder()->first();

        return [
            
            'nome' => fake()->word(),
            'animal_id' => $animal->id,
            'valor' => money(random_int(100, 100000)),
            'data' => fake()->date(),
            'local' => fake()->word(),
            'descricao' => fake()->text(), 
        ];
    }
}
