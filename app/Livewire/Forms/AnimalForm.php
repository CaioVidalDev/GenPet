<?php

namespace App\Livewire\Forms;

use App\Enums\Especie;
use App\Enums\Porte;
use App\Enums\Sexo;
use App\Models\Animal;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Validation\Rule;

class AnimalForm extends Form
{
    public ?Animal $animal;

    #[Validate('required|max:256')]
    public $nome = '';

    #[Validate('required|exists:guardiaos,id')]
    public $guardiao_id = '';

    #[Validate('required')]
    public $nascimento = '';

    #[Validate('required')]
    public $especie = '';

    #[Validate('required')]
    public $porte = '';

    #[Validate('required|max:100')]
    public $raca = '';

    #[Validate('required|max:100')]
    public $pelagem = '';
    
    #[Validate('required')]
    public $sexo = '';

    #[Validate('nullable|max:100')]
    public $microship = '';

    #[Validate('nullable|max:2048')]
    public $observacoes = '';

    protected array $messages = [
        'guardiao_id.required' => 'O campo guardião é obrigatório.',
    ];

    public function rules() 
    {
        return [

            'especie' => [
                'required',
                Rule::enum(Especie::class)
            ],

            'sexo' => [
                'required',
                Rule::enum(Sexo::class)
            ],

            'porte' => [
                'required',
                Rule::enum(Porte::class)
            ],
        
        ];
    }

    public function setAnimal(Animal $animal)
    {
        $this->animal = $animal;

        $this->nome = $animal->nome;
        $this->guardiao_id = $animal->guardiao_id;
        $this->nascimento = $animal->nascimento;
        $this->especie = $animal->especie;
        $this->porte = $animal->porte;

        $this->raca = $animal->raca;
        $this->pelagem = $animal->pelagem;
        $this->sexo = $animal->sexo;
        $this->microship = $animal->microship;
        $this->observacoes = $animal->observacoes;

    }

    public function store(): Animal
    {
        $this->validate();

        $animal = Animal::create([
            'nome' => $this->nome,
            'guardiao_id' => $this->guardiao_id,
            'nascimento' => $this->nascimento,
            'especie' => $this->especie,
            'porte' => $this->porte,

            'raca' => $this->raca,
            'pelagem' => $this->pelagem,
            'sexo' => $this->sexo,
            'microship' => $this->microship,
            'observacoes' => $this->observacoes,
        ]);

    
        $animal->save();
        
        return $animal;
    }

    public function update(): Animal
    {
        
        $this->validate();

        $this->animal->fill([
            'nome' => $this->nome,
            'guardiao_id' => $this->guardiao_id,
            'nascimento' => $this->nascimento,
            'especie' => $this->especie,
            'porte' => $this->porte,

            'raca' => $this->raca,
            'pelagem' => $this->pelagem,
            'sexo' => $this->sexo,
            'microship' => $this->microship,
            'observacoes' => $this->observacoes,
        ]);

        $this->animal->push();
        
        return $this->animal;

    }
}
