<?php

namespace Tests\Feature\App\Modules\Application;

use App\Modules\Invoices\Contracts\Application\InvoiceUpdaterInterface;
use App\Modules\Invoices\Models\InvoiceModel;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

class InvoiceUpdaterTest extends TestCase
{
    /**
     * Test if the invoice is updated
     *
     * @return void
     */
    public function test_should_update_an_invoice(): void
    {
        $invoiceFactory = InvoiceModel::factory()->create();
        $invoiceUpdater = app(InvoiceUpdaterInterface::class);
 
        $newInvoice = [
            'number'     => (string) Uuid::uuid4(),
            'date'       => '2021-01-01',
            'due_date'   => '2021-01-31',
            'company_id' => (string) Uuid::uuid4(),
            'status'     => 'draft',
        ];

        $invoiceUpdater->update($invoiceFactory->id, $newInvoice);

        $invoice = InvoiceModel::find($invoiceFactory->id);

        $this->assertNotNull($invoice);
        $this->assertEquals($newInvoice['number'], $invoice->number);
        $this->assertEquals($newInvoice['date'], $invoice->date);
        $this->assertEquals($newInvoice['due_date'], $invoice->due_date);
        $this->assertEquals($newInvoice['company_id'], $invoice->company_id);
        $this->assertEquals($newInvoice['status'], $invoice->status);
        $this->assertDatabaseCount('invoices', 1);
    }
}
