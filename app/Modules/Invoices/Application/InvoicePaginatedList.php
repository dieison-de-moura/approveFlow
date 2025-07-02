<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application;

use App\Modules\Invoices\Contracts\Application\InvoicePaginatedListInterface;
use App\Modules\Invoices\Contracts\Repositories\InvoiceRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Caso de uso para listagem paginada de invoices.
 */
final class InvoicePaginatedList implements InvoicePaginatedListInterface
{
    public function __construct(
        protected InvoiceRepositoryInterface $repository
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($perPage);
    }
}
