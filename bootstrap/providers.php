<?php

return [
    App\Modules\Approval\Providers\ApprovalsServiceProvider::class,
    App\Modules\Invoices\Providers\ApplicationServiceProvider::class,
    App\Modules\Invoices\Providers\EventServiceProvider::class,
    App\Modules\Invoices\Providers\RepositoryServiceProvider::class,
    App\Providers\DatabaseServiceProvider::class,
];
