<?php

namespace App\Modules\Invoices\Listeners;

use App\Domain\Enums\InvoiceStatusEnum;
use App\Modules\Approval\Events\EntityApproved;
use Illuminate\Support\Facades\Log;
use App\Modules\Invoices\Contracts\Application\InvoiceUpdaterInterface;

class OnEntityApproved
{
    public function handle(EntityApproved $event)
    {
        Log::info('Approving invoice ', [
            'invoice_id' => $event->approvalDto->id
        ]);

        with(
            app(InvoiceUpdaterInterface::class),
            fn(InvoiceUpdaterInterface $updater)
                => $updater->update($event->approvalDto->id, ['status' => InvoiceStatusEnum::APPROVED->value])
        );
    }
}
