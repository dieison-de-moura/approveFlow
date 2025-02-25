<?php

namespace App\Modules\Invoices\Entities;

use App\Domain\Enums\InvoiceStatusEnum;

final class Invoice extends Entity
{
    public function __construct(
        public string $id,
        public string $number,
        public string $date,
        public string $dueDate,
        public string $companyId,
        public InvoiceStatusEnum $status
    ) {
    }
}
