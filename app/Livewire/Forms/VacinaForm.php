<?php

namespace App\Livewire\Forms;

use App\Models\Vacina;
use Livewire\Attributes\Validate;
use Livewire\Form;

class VacinaForm extends Form
{
    public ?Vacina $vacina;

    #[Validate('required|max:256')]
    public $nome = '';

    #[Validate('required|exists:animals,id')]
    public $animal_id = '';

    #[Validate('required|max:256')]
    public $laboratorio = '';

    #[Validate('nullable|inetger')]
    public $lote = '';

    #[Validate('required')]
    public $aplicacao = '';

    #[Validate('nullable')]
    public $revacinacao = '';
    
    #[Validate('nullable|max:2048')]
    public $observacoes = '';

    protected array $messages = [
        'animal_id.required' => 'O campo animal é obrigatório.',
    ];

    public function setVacina(Vacina $vacina)
    {
        $this->vacina = $vacina;

        $this->nome = $vacina->nome;
        $this->animal_id = $vacina->animal_id;
        $this->laboratorio = $vacina->laboratorio;
        $this->lote = $vacina->lote;

        $this->aplicacao = $vacina->aplicacao;
        $this->revacinacao = $vacina->revacinacao;
        $this->observacoes = $vacina->observacoes;

    }

    public function store(): Vacina
    {
        $this->validate();

        $vacina = Vacina::create([
            'nome' => $this->nome,
            'animal_id' => $this->animal_id,
            'laboratorio' => $this->laboratorio,
            'lote' => $this->lote,

            'aplicacao' => $this->aplicacao,
            'revacinacao' => $this->revacinacao,
            'observacoes' => $this->observacoes,
        ]);

    
        $vacina->save();
        
        return $vacina;
    }

    public function update(): Vacina
    {
        
        $this->validate();

        $this->vacina->fill([
            'nome' => $this->nome,
            'animal_id' => $this->animal_id,
            'laboratorio' => $this->laboratorio,
            'lote' => $this->lote,

            'aplicacao' => $this->aplicacao,
            'revacinacao' => $this->revacinacao,
            'observacoes' => $this->observacoes,
        ]);

        $this->vacina->push();
        
        return $this->vacina;

    }
}
