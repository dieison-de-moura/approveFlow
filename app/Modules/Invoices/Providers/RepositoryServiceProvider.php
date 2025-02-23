<?php

namespace App\Modules\Invoices\Providers;

use App\Modules\Invoices\Contracts\Repositories\InvoiceRepositoryInterface;
use App\Modules\Invoices\Repositories\InvoiceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
