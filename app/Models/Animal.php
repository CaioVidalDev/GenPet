<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
            'nome' ,  
            'especie' , 
            'raca' ,  
            'cor' ,  
            'porte' , 
            'nascimento' ,  
            'sexo' , 
            'observacoes'
    ];

    public function guardiao(): BelongsTo
    {
        return $this->belongsTo(Guardiao::class)->withTrashed();
    }

   
}
