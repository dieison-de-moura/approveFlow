<?php

namespace App\Modules\Invoices\Contracts\Application;

interface InvoiceRejectorInterface
{
    /**
     * @param string $id
     * @return void
     */
    public function reject(string $id): void;
}
