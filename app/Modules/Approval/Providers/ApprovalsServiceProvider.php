<?php

declare(strict_types=1);

namespace App\Modules\Approval\Providers;

use App\Modules\Approval\Contracts\ApprovalInterface;
use App\Modules\Approval\Application\Approval;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ApprovalsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->scoped(ApprovalInterface::class, Approval::class);
    }

    /**
     * @return array<class-string>
     */
    public function provides(): array
    {
        return [
            ApprovalInterface::class,
        ];
    }
}
