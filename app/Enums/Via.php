<?php

namespace App\Enums;

enum Via: string
{

    use Enum;
    
    case Oral = 'Oral';
    case Topica = 'Tópica';
    case Injetavel = 'Injetável';
    case Topica_Otologica = 'Tópica Otológica';
    case Coleiras = 'Coleiras';
    case Spray = 'Spray';
    case Subcutanea = 'Subcutânea';
    
}
