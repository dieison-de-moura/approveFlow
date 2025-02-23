<?php

declare(strict_types=1);

namespace App\Modules\Approval\Events;

use App\Modules\Approval\Dto\ApprovalDto;
use Illuminate\Support\Facades\Log;

final readonly class EntityRejected
{
    public function __construct(public ApprovalDto $approvalDto)
    {
        Log::info('Event rejecting invoice...');
    }
}
