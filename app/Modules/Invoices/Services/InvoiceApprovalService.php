<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Services;

use App\Domain\Shared\ApprovalFacade;
use App\Modules\Approval\Dto\ApprovalDto;
use App\Modules\Invoices\Contracts\Services\InvoiceApprovalServiceInterface;

class InvoiceApprovalService implements InvoiceApprovalServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function approve(ApprovalDto $approvalDto): true
    {
        return ApprovalFacade::approve($approvalDto);
    }

    /**
     * {@inheritDoc}
     */
    public function reject(ApprovalDto $approvalDto): true
    {
        return ApprovalFacade::reject($approvalDto);
    }
}
