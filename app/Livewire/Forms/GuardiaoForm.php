<?php

namespace App\Livewire\Forms;

use App\Models\Guardiao;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GuardiaoForm extends Form
{
    public ?Guardiao $guardiao;

    #[Validate('required|max:256')]
    public $nome = '';

    #[Validate('nullable|email')]
    public $email = '';

    #[Validate('required|phone:BR')]
    public $telefone = '';

    public function setGuardiao(Guardiao $guardiao)
    {
        $this->guardiao = $guardiao;

        $this->nome = $guardiao->nome;
        $this->email = $guardiao->email;

        $this->telefone = $guardiao->telefone;

    }

    public function store(): Guardiao
    {
        $this->validate();

        $guardiao = Guardiao::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone
        ]);

    
        $guardiao->save();
        
        return $guardiao;
    }

    public function update(): Guardiao
    {
        
        $this->validate();

        $this->guardiao->fill([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone
        ]);

        $this->guardiao->push();
        
        return $this->guardiao;

    }
}
