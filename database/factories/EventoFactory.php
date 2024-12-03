<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{

    public function definition(): array
    {
       
            return [
                'titulo' => fake()->name(),
                'observacoes' => fake()->text(),
                'inicio' => fake()->dateTimeBetween('0 days', '+1 days'),
                'fim' => fake()->dateTimeBetween('0 days', '+1 days'),
    
            ];
    }
}
