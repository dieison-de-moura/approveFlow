<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Contracts\Application;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Contrato para listagem paginada de invoices.
 */
interface InvoicePaginatedListInterface
{
    /**
     * Retorna uma lista paginada de invoices.
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator;
}
