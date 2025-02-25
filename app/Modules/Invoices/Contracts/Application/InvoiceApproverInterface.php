<?php

namespace App\Modules\Invoices\Contracts\Application;

use App\Modules\Invoices\Exceptions\UnprocessableContentException;

interface InvoiceApproverInterface
{
    /**
     * @param string $id
     * @return void
     * @throws UnprocessableContentException
     */
    public function approve(string $id): void;
}
