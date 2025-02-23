<?php

declare(strict_types=1);

namespace App\Modules\Approval\Dto;

use App\Domain\Enums\InvoiceStatusEnum;
use Ramsey\Uuid\UuidInterface;

final readonly class ApprovalDto
{
    /** @param class-string $entity */
    public function __construct(
        public UuidInterface $id,
        public InvoiceStatusEnum $status,
    ) {
    }
}
