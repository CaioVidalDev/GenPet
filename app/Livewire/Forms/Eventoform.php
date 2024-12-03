<?php

namespace App\Livewire\Forms;

use App\Models\Evento;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EventoForm extends Form
{
    public ?Evento $evento = null;

    #[Validate('required|max:256')]
    public $titulo;

    #[Validate('required')]
    public $inicio_data = '';

    #[Validate('required|date_format:H:i')]
    public $inicio_hora = '';

    #[Validate('required')]
    public $fim_data;

    #[Validate('required|date_format:H:i')]
    public $fim_hora;

    #[Validate('nullable|max:2048')]
    public $observacoes = '';

    protected array $messages = [
        'agenda_id.required' => 'O campo agenda é obrigatório.',
        'agenda_id.exists' => 'O campo agenda deve existir.',
        'inicio_data.required' => 'O campo data de início é obrigatório.',
        'inicio_hora.required' => 'O campo hora de início é obrigatório.',
        'fim_data.required' => 'O campo data do fim é obrigatório.',
        'fim_hora.required' => 'O campo hora do fim é obrigatório.',
    ];

    public function setEvento(Evento $evento)
    {
        $this->evento = $evento;

        $this->titulo = $this->evento->titulo;

        $this->inicio_data = Carbon::parse($evento->inicio)->format('Y-m-d');
        $this->inicio_hora = Carbon::parse($evento->inicio)->format('H:i');

        $this->fim_data = Carbon::parse($evento->fim)->format('Y-m-d');
        $this->fim_hora = Carbon::parse($evento->fim)->format('H:i');

        $this->observacoes = $this->evento->observacoes ?? '';
    }

    public function store()
    {

        $this->validate();

        $evento = new Evento();

        $evento->fill($this->only(['titulo', 'observacoes']));

        $evento->inicio = Carbon::parse($this->inicio_data)->format('Y-m-d') . ' ' . $this->inicio_hora;

        $evento->fim = Carbon::parse($this->fim_data)->format('Y-m-d') . ' ' . $this->fim_hora;

        $evento->save();

        return $evento;
    }

    public function update()
    {
        $this->validate();

        $this->evento->fill($this->only(['titulo', 'observacoes']));

        $this->evento->inicio = Carbon::parse($this->inicio_data)->format('Y-m-d') . ' ' . $this->inicio_hora;

        $this->evento->fim = Carbon::parse($this->fim_data)->format('Y-m-d') . ' ' . $this->fim_hora;

        $this->evento->save();

        return $this->evento;
    }
}
