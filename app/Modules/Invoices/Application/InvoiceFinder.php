<?php

namespace App\Modules\Invoices\Application;

use App\Modules\Invoices\Contracts\Application\InvoiceFinderInterface;
use App\Modules\Invoices\Contracts\Repositories\InvoiceRepositoryInterface;
use App\Modules\Invoices\Entities\Invoice;
use App\Modules\Invoices\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Log;

final class InvoiceFinder implements InvoiceFinderInterface
{
    public function __construct(protected readonly InvoiceRepositoryInterface $repository)
    {
    }

    /**
     * @inhaeritDoc
     */
    public function find(string $id): Invoice
    {
        Log::info('Finding invoice...', ['id' => $id]);
        $invoice = $this->repository->find($id);

        if (is_null($invoice)) {
            throw new NotFoundException("Invoice with id {$id} not found");
        }

        return $invoice;
    }
}
