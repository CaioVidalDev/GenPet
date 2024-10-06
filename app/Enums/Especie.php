<?php

namespace App\Enums;

enum Especie: string
{
    use Enum;

    case Canino = 'Canino';
    case Felino = 'Felino';
    case Equino = 'Equino';
    case Bovino = 'Bovino';
    case Suino = 'Suíno';
    case Caprino = 'Caprino';
    case Ovino = 'Ovino';
    case Aves = 'Aves';
    case Peixe = 'Peixe';
    case Reptil = 'Réptil';
    case Anfibio = 'Anfíbio';
    case Roedor = 'Roedor';
    case Crustaceo = 'Crustáceo';
    case Molusco = 'Molusco';
    case Primata = 'Primata';
    case Marsupial = 'Marsupial';
    case Cetaceo = 'Cetáceo';
    case Avestruz = 'Avestruz';
    case Camelideo = 'Camelídeo';
}
