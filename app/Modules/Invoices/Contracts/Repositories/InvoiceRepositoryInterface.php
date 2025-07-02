<?php

namespace App\Modules\Invoices\Contracts\Repositories;

use App\Modules\Invoices\Entities\Invoice;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface InvoiceRepositoryInterface
{
    /**
     * @param string $id
     * @return Invoice|null
     */
    public function find(string $id): ?Invoice;

    /**
     * @param string $id
     * @param array  $data
     * @return void
     */
    public function update(string $id, array $data): void;

    /**
     * Retorna uma lista paginada de invoices.
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator;
}
