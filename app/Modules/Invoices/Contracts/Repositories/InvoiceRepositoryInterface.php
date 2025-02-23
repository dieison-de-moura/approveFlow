<?php

namespace App\Modules\Invoices\Contracts\Repositories;

use App\Modules\Invoices\Entities\Invoice;

interface InvoiceRepositoryInterface
{
    /**
     * @param int $id
     * @return Invoice|null
     */
    public function find(string $id): ?Invoice;

    /**
     * @param string $id
     * @param array  $data
     * @return void
     */
    public function update(string $id, array $data): void;
}
