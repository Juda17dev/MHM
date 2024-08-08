<?php
namespace App\Enums;

use App\Traits\EnumValuesTrait;

enum TypeStatutEnum: string
{
    use EnumValuesTrait;

    case ACCEPTED = 'Accepter';
    case REFUSED = 'Refuser';
    case PENDING = 'En attente';
}
