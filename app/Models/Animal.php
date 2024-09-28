<?php

namespace App\Models;

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
            'especie' , 
            'raca' ,  
            'pelagem' ,  
            'porte' , 
            'nascimento' ,  
            'sexo' , 
            'microship',
            'observacoes'
    ];

    protected function casts(): array
    {
        
        return [

            'porte' => Porte::class,
            'sexo' => Sexo::class,
        ];
                
    }


}
