<?php

namespace App\Modules\Invoices\Providers;

use App\Modules\Approval\Events\{EntityApproved, EntityRejected};
use App\Modules\Invoices\Listeners\{OnEntityApproved, OnEntityRejected};
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function listens(): array
    {
        return [
            EntityApproved::class => [OnEntityApproved::class],
            EntityRejected::class => [OnEntityRejected::class],
        ];
    }
}
