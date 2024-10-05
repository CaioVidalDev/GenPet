<?php

namespace App\Livewire\Forms;

use App\Models\Servico;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ServicoForm extends Form
{
    public ?Servico $servico;

    #[Validate('required|max:256')]
    public $nome = '';

    #[Validate('required|exists:animals,id')]
    public $animal_id = '';

    #[Validate('required')]
    public $valor = '';

    #[Validate('nullable|max:150')]
    public $local = '';

    #[Validate('required')]
    public $data = '';

    #[Validate('nullable|max:2048')]
    public $descricao = '';

    protected array $messages = [
        'animal_id.required' => 'O campo animal é obrigatório.',
    ];

    public function setServico(Servico $servico)
    {
        $this->servico = $servico;

        $this->nome = $servico->nome;
        $this->animal_id = $servico->animal_id;
        $this->valor = $servico->valor->format();
        $this->local = $servico->local;
        $this->data = $servico->data;
        $this->descricao = $servico->descricao;

    }

    public function store(): Servico
    {
        $this->validate();

        $servico = Servico::create([
            'nome' => $this->nome,
            'animal_id' => $this->animal_id,
            'valor' => add_cents_if_none($this->valor),
            'local' => $this->local,
            'data' => $this->data,
            'descricao' => $this->descricao,
        ]);

    
        $servico->save();
        
        return $servico;
    }

    public function update(): Servico
    {
        
        $this->validate();

        $this->servico->fill([
            'nome' => $this->nome,
            'animal_id' => $this->animal_id,
            'valor' => add_cents_if_none($this->valor),
            'local' => $this->local,
            'data' => $this->data,
            'descricao' => $this->descricao,
        ]);

        $this->servico->push();
        
        return $this->servico;

    }
}
