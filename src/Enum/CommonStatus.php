<?php

declare(strict_types=1);

namespace App\Enum;

enum CommonStatus: string
{
    case PENDING = 'pending';
    case DRAFT = 'draft';
    case REJECTED = 'rejected';
    case APPROVED = 'approved';
}
