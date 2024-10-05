<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Guardiao;
use App\Models\Servico;
use App\Models\Tratamento;
use App\Models\User;
use App\Models\Vacina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('123456')
        ]);

        User::factory()->create([
            'name' => 'Caio Nobre Vidal',
            'email' => 'caiovidal.dev@gmail.com',
            'password' => Hash::make('123456')
        ]);

        Guardiao::factory(30)->create();
        Animal::factory(30)->create();
        Vacina::factory(30)->create();
        Tratamento::factory(30)->create();
        Servico::factory(30)->create();

    }
}
