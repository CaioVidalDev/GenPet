<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    public $inicio_formatted = '';
    public $fim_formatted = '';

    protected $fillable = [
        'titulo',
        'inicio',
        'fim',
        'observacoes'

    ];

    protected static function booted(): void
    {
        static::retrieved(function (Evento $evento) {
            $evento->inicio_formatted = $evento->inicio?->format('d/m/Y');
            $evento->fim_formatted = $evento->fim?->format('d/m/Y');
        });
    }

    protected function casts()
    {
        return [
            'inicio' => 'datetime:d/m/Y H:i',
            'fim' => 'datetime:d/m/Y H:i',
        ];
    }
}
