<?php

namespace App\Modules\Invoices\Contracts\Application;

use App\Modules\Invoices\Entities\Invoice;
use App\Modules\Invoices\Exceptions\NotFoundException;

interface InvoiceFinderInterface
{
    /**
     * @param string $id
     * @return Invoice
     * @throws NotFoundException
     */
    public function find(string $id): Invoice;
}
