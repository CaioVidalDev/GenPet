<?php

namespace App\Models;

use App\Enums\Especie;
use App\Enums\Porte;
use App\Enums\Sexo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
            'nome' ,  
            'guardiao_id',
            'especie' , 
            'raca' ,  
            'pelagem' ,  
            'porte' , 
            'nascimento' ,  
            'sexo' , 
            'microship',
            'observacoes'
    ];

    public function guardiao(): BelongsTo
    {
        return $this->belongsTo(Guardiao::class)->withTrashed();
    }

    protected function casts(): array
    {
        
        return [
            'especie' => Especie::class,
            'porte' => Porte::class,
            'sexo' => Sexo::class,
        ];
                
    }


}
