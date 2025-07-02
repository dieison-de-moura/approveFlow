<?php

namespace App\Modules\Invoices\Repositories;

use App\Domain\Enums\InvoiceStatusEnum;
use App\Modules\Invoices\Contracts\Repositories\InvoiceRepositoryInterface;
use App\Modules\Invoices\Entities\Invoice;
use App\Modules\Invoices\Models\InvoiceModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function __construct(protected InvoiceModel $model)
    {
    }

    /**
     * @inheritDoc
     */
    public function find(string $id): ?Invoice
    {
        $invoice = $this->model->find($id);

        if (!$invoice) {
            return null;
        }

        return new Invoice(
            $invoice->id,
            $invoice->number,
            $invoice->date,
            $invoice->due_date,
            $invoice->company_id,
            InvoiceStatusEnum::from($invoice->status),
        );
    }

    /**
     * @inheritDoc
     */
    public function update(string $id, array $data): void
    {
        $invoice = $this->model->find($id);

        if ($invoice) {
            $invoice->update($data);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }
}
