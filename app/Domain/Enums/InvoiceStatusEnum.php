<?php

declare(strict_types=1);

namespace App\Domain\Enums;

enum InvoiceStatusEnum: string
{
    case DRAFT    = 'draft';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}
