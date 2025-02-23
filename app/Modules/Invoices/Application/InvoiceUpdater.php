<?php

namespace App\Modules\Invoices\Application;

use App\Modules\Invoices\Contracts\Application\InvoiceUpdaterInterface;
use App\Modules\Invoices\Contracts\Repositories\InvoiceRepositoryInterface;

final class InvoiceUpdater implements InvoiceUpdaterInterface
{
    public function __construct(protected readonly InvoiceRepositoryInterface $repository)
    {
    }

    /**
     * @inhaeritDoc
     */
    public function update(string $id, array $data): void
    {
        $this->repository->update($id, $data);
    }
}
