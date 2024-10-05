<?php

namespace App\Models;

use App\Enums\Via;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tratamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tipo',  
        'animal_id',
        'data_tratamento',
        'produto_utilizado',
        'dosagem',
        'via_administracao',
        'veterinario_responsavel',  
        'observacoes',  
    ];

    protected function casts(): array
    {
        return [

            'via' => Via::class,
        
        ];         
    }

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class)->withTrashed();
    }
}
