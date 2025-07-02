<?php

namespace App\Modules\Invoices\Application;

use App\Modules\Approval\Dto\ApprovalDto;
use App\Modules\Invoices\Contracts\Application\InvoiceApproverInterface;
use App\Modules\Invoices\Contracts\Application\InvoiceFinderInterface;
use App\Modules\Invoices\Contracts\Services\InvoiceApprovalServiceInterface;
use App\Modules\Invoices\Exceptions\UnprocessableContentException;
use LogicException;
use Ramsey\Uuid\Uuid;

final class InvoiceApprover implements InvoiceApproverInterface
{
    /**
     * @inhaeritDoc
     */
    public function approve(string $id): void
    {
        $invoice = with(
            app(InvoiceFinderInterface::class),
            fn(InvoiceFinderInterface $finder) => $finder->find($id)
        );

        $dto = new ApprovalDto(
            Uuid::fromString($invoice->id),
            $invoice->status,
        );

        try {
            with(
                app(InvoiceApprovalServiceInterface::class),
                fn(InvoiceApprovalServiceInterface $service) => $service->approve($dto)
            );
        } catch (LogicException $error) {
            throw new UnprocessableContentException($error->getMessage(), 422, $error);
        }
    }
}
