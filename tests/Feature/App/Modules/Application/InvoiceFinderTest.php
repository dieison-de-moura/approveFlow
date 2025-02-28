<?php

namespace Tests\Feature\App\Modules\Application;

use App\Domain\Enums\InvoiceStatusEnum;
use App\Modules\Invoices\Contracts\Application\InvoiceFinderInterface;
use App\Modules\Invoices\Entities\Invoice;
use App\Modules\Invoices\Exceptions\NotFoundException;
use App\Modules\Invoices\Models\InvoiceModel;
use Tests\TestCase;

class InvoiceFinderTest extends TestCase
{
    /**
     * Test if the invoice is found by id
     *
     * @return void
     */
    public function test_should_find_an_invoice_by_id(): void
    {
        $invoiceFactory = InvoiceModel::factory()->create();
        $invoiceFinder  = app(InvoiceFinderInterface::class);

        $invoice = $invoiceFinder->find($invoiceFactory->id);

        $this->assertNotNull($invoice);
        $this->assertInstanceOf(Invoice::class, $invoice);
        $this->assertEquals($invoiceFactory->id, $invoice->id);
        $this->assertInstanceOf(InvoiceStatusEnum::class, $invoice->status);
        $this->assertDatabaseCount('invoices', 1);
    }

    /**
     * Test if the exception is thrown when the invoice is not found
     *
     * @return void
     */
    public function test_should_throw_not_found_exception_when_invoice_is_not_found(): void
    {
        $invoiceFinder = app(InvoiceFinderInterface::class);

        $this->expectException(NotFoundException::class);

        $invoiceFinder->find('invoice-123');
    }
}
