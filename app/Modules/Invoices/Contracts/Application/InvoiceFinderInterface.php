<?php

namespace App\Modules\Invoices\Contracts\Application;

use App\Modules\Invoices\Entities\Invoice;

interface InvoiceFinderInterface
{
    /**
     * @param string $id
     * @return Invoice
     */
    public function find(string $id): Invoice;
}
