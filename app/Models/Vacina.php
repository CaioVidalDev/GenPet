<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacina extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',  
        'animal_id',
        'laboratorio',
        'lote',
        'aplicacao',
        'revacinacao',
        'observacoes',  
    ];

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class)->withTrashed();
    }
    
}
