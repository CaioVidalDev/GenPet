<?php

namespace App\Livewire\Calendars;

use App\Models\Evento;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Calendario extends Component
{
    public $defaultMode = 'timeGridWeek';
    public $selectedEvento = null;

    public function render()
    {

        $events = Evento::get()->map(function (Evento $evento) {
            return [
                'id' => $evento->id,
                'title' => $evento->titulo,
                'start' => $evento->inicio = Carbon::parse($evento->inicio)->format('Y-m-d H:i'),
                'end' => $evento->fim = Carbon::parse($evento->fim)->format('Y-m-d H:i'),
            ];
        })->toArray();

        return view('livewire.calendars.calendario')->with([
            'events' => $events,
            'defaultMode' => $this->defaultMode,
        ]);

    }
}