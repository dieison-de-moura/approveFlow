<?php

namespace App\Modules\Invoices\Providers;

use App\Modules\Invoices\Application\{InvoiceApprover, InvoiceFinder, InvoiceRejector, InvoiceUpdater};
use App\Modules\Invoices\Contracts\Application\{
    InvoiceApproverInterface,
    InvoiceFinderInterface,
    InvoiceRejectorInterface,
    InvoiceUpdaterInterface
};
use Illuminate\Support\ServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(InvoiceFinderInterface::class, InvoiceFinder::class);
        $this->app->bind(InvoiceApproverInterface::class, InvoiceApprover::class);
        $this->app->bind(InvoiceUpdaterInterface::class, InvoiceUpdater::class);
        $this->app->bind(InvoiceRejectorInterface::class, InvoiceRejector::class);
    }

    public function boot(): void
    {
        //
    }
}
