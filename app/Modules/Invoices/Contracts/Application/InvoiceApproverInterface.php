<?php

namespace App\Modules\Invoices\Contracts\Application;

interface InvoiceApproverInterface
{
    /**
     * @param string $id
     * @return void
     */
    public function approve(string $id): void;
}
