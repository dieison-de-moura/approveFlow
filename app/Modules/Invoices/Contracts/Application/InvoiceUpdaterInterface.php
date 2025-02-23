<?php

namespace App\Modules\Invoices\Contracts\Application;

interface InvoiceUpdaterInterface
{
    /**
     * @param string $id
     * @param array  $data
     * @return void
     */
    public function update(string $id, array $data): void;
}
