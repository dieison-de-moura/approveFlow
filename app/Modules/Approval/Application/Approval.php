<?php

declare(strict_types=1);

namespace App\Modules\Approval\Application;

use App\Domain\Enums\InvoiceStatusEnum;
use App\Modules\Approval\Contracts\ApprovalInterface;
use App\Modules\Approval\Dto\ApprovalDto;
use App\Modules\Approval\Events\{EntityApproved, EntityRejected};
use Illuminate\Contracts\Events\Dispatcher;
use LogicException;

final readonly class Approval implements ApprovalInterface
{
    public function __construct(private Dispatcher $dispatcher)
    {
    }

    /**
     * @inharitDoc
     */
    public function approve(ApprovalDto $approvalDto): true
    {
        $this->validate($approvalDto);
        $this->dispatcher->dispatch(new EntityApproved($approvalDto));

        return true;
    }

    /**
     * @inharitDoc
     */
    public function reject(ApprovalDto $approvalDto): true
    {
        $this->validate($approvalDto);
        $this->dispatcher->dispatch(new EntityRejected($approvalDto));

        return true;
    }

    /**
     * Validate incoice status
     *
     * @param ApprovalDto $approvalDto
     * @return void
     * @throws LogicException
     */
    private function validate(ApprovalDto $approvalDto): void
    {
        if (InvoiceStatusEnum::DRAFT !== $approvalDto->status) {
            throw new LogicException('approval status is already assigned');
        }
    }
}
