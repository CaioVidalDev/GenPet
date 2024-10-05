<?php

namespace App\Livewire\Forms;

use App\Enums\Via;
use App\Models\Tratamento;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Validation\Rule;

class TratamentoForm extends Form
{
    public ?Tratamento $tratamento;

    #[Validate('required|max:256')]
    public $tipo = '';

    #[Validate('required|exists:animals,id')]
    public $animal_id = '';

    #[Validate('required')]
    public $data_tratamento = '';

    #[Validate('required|max:256')]
    public $produto_utilizado = '';

    #[Validate('required|integer')]
    public $dosagem = '';

    #[Validate('required')]
    public $via_administracao = '';

    #[Validate('required|max:256')]
    public $veterinario_responsavel = '';
    
    #[Validate('nullable|max:2048')]
    public $observacoes = '';

    protected array $messages = [
        'animal_id.required' => 'O campo animal é obrigatório.',
    ];

    public function rules() 
    {
        return [
            'via_administracao' => [
                'required',
                Rule::enum(Via::class)
            ],
        
        ];
    }

    public function setTratamento(Tratamento $tratamento)
    {
        $this->tratamento = $tratamento;

        $this->tipo = $tratamento->tipo;
        $this->animal_id = $tratamento->animal_id;
        $this->data_tratamento = $tratamento->data_tratamento;
        $this->produto_utilizado = $tratamento->produto_utilizado;

        $this->dosagem = $tratamento->dosagem;
        $this->via_administracao = $tratamento->via_administracao;
        $this->veterinario_responsavel = $tratamento->veterinario_responsavel;
        $this->observacoes = $tratamento->observacoes;

    }

    public function store(): Tratamento
    {
        $this->validate();

        $tratamento = Tratamento::create([
            'tipo' => $this->tipo,
            'animal_id' => $this->animal_id,
            'data_tratamento' => $this->data_tratamento,
            'produto_utilizado' => $this->produto_utilizado,

            'dosagem' => $this->dosagem,
            'via_administracao' => $this->via_administracao,
            'veterinario_responsavel' => $this->veterinario_responsavel,
            'observacoes' => $this->observacoes,
        ]);

    
        $tratamento->save();
        
        return $tratamento;
    }

    public function update(): Tratamento
    {
        
        $this->validate();

        $this->tratamento->fill([
            'tipo' => $this->tipo,
            'animal_id' => $this->animal_id,
            'data_tratamento' => $this->data_tratamento,
            'produto_utilizado' => $this->produto_utilizado,

            'dosagem' => $this->dosagem,
            'via_administracao' => $this->via_administracao,
            'veterinario_responsavel' => $this->veterinario_responsavel,
            'observacoes' => $this->observacoes,
        ]);

        $this->tratamento->push();
        
        return $this->tratamento;

    }
}
