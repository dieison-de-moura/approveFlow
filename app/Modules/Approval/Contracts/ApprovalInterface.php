<?php

declare(strict_types=1);

namespace App\Modules\Approval\Contracts;

use App\Modules\Approval\Dto\ApprovalDto;
use LogicException;

interface ApprovalInterface
{
    /**
     * Approve invoice
     *
     * @param ApprovalDto $approvalDto
     * @return true
     * @throws LogicException
     */
    public function approve(ApprovalDto $approvalDto): true;

    /**
     * Reject invoice
     *
     * @param ApprovalDto $approvalDto
     * @return true
     * @throws LogicException
     */
    public function reject(ApprovalDto $approvalDto): true;
}
