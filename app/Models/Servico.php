<?php

namespace App\Models;

use Cknow\Money\Casts\MoneyIntegerCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servico extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',  
        'animal_id',
        'valor',
        'local',
        'data',
        'descricao',
    ];

    protected function casts(): array
    {
        return [

            'valor' => MoneyIntegerCast::class
        ];         
    }

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class)->withTrashed();
    }
}
