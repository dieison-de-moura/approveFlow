<?php

namespace App\Modules\Invoices\Entities;

use App\Domain\Enums\InvoiceStatusEnum;

final class Invoice extends Entity
{
    public function __construct(
        protected string $id,
        protected string $number,
        protected string $date,
        protected string $dueDate,
        protected string $companyId,
        protected InvoiceStatusEnum $status
    ) {
    }
}
