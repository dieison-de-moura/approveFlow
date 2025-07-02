<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Contracts\Services;

use App\Modules\Approval\Dto\ApprovalDto;

interface InvoiceApprovalServiceInterface
{
    /**
     * Aprova uma invoice.
     *
     * @param ApprovalDto $approvalDto
     * @return true
     */
    public function approve(ApprovalDto $approvalDto): true;

    /**
     * Rejeita uma invoice.
     *
     * @param ApprovalDto $approvalDto
     * @return true
     */
    public function reject(ApprovalDto $approvalDto): true;
}
