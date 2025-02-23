<?php

namespace App\Modules\Invoices\Listeners;

use App\Modules\Approval\Events\EntityRejected;
use Illuminate\Support\Facades\Log;
use App\Domain\Enums\InvoiceStatusEnum;
use App\Modules\Invoices\Contracts\Application\InvoiceUpdaterInterface;

class OnEntityRejected
{
    public function handle(EntityRejected $event)
    {
        Log::info('Rejecting invoice ', [
            'invoice_id' => $event->approvalDto->id
        ]);

        with(
            app(InvoiceUpdaterInterface::class),
            fn(InvoiceUpdaterInterface $updater)
                => $updater->update($event->approvalDto->id, ['status' => InvoiceStatusEnum::REJECTED->value])
        );
    }
}
