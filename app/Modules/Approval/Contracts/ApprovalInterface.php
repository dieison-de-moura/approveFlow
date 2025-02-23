<?php

declare(strict_types=1);

namespace App\Modules\Approval\Contracts;

use App\Modules\Approval\Dto\ApprovalDto;

interface ApprovalInterface
{
    /**
     * Approve invoice
     *
     * @param ApprovalDto $approvalDto
     * @return true
     * @throws LogicException
     */
    public function approve(ApprovalDto $entity): true;

    /**
     * Reject invoice
     *
     * @param ApprovalDto $approvalDto
     * @return true
     * @throws LogicException
     */
    public function reject(ApprovalDto $entity): true;
}
