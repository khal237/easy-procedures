<?php

declare(strict_types=1);

namespace App\Enum;


enum REQUIREMENT_TYPES: string
{
    case FORM = 'formulaire';
    case FILE = 'file';
}

