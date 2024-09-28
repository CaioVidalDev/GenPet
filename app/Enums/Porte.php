<?php

namespace App\Enums;

enum Porte: string
{

    use Enum;
    
    case Miniatura = 'Miniatura';
    case Pequeno = 'Pequeno';
    case Medio = 'Medio';
    case Grande = 'Grande';
    case Gigante = 'Gigante';
    
}
