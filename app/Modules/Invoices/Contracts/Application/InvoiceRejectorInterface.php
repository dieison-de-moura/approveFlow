<?php

namespace App\Modules\Invoices\Contracts\Application;

use App\Modules\Invoices\Exceptions\UnprocessableContentException;

interface InvoiceRejectorInterface
{
    /**
     * @param string $id
     * @return void
     * @throws UnprocessableContentException
     */
    public function reject(string $id): void;
}
