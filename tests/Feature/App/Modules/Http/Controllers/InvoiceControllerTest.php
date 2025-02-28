<?php

namespace Tests\Feature\App\Modules\Http\Controllers;

use App\Modules\Invoices\Contracts\Application\InvoiceApproverInterface;
use App\Modules\Invoices\Contracts\Application\InvoiceFinderInterface;
use App\Modules\Invoices\Contracts\Application\InvoiceRejectorInterface;
use App\Modules\Invoices\Models\InvoiceModel;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class InvoiceControllerTest extends TestCase
{

    /**
     * Test approve an invoice.
     *
     * @return void
     */
    public function testApproveInvoice(): void
    {
        $invoice = InvoiceModel::factory()->create(['status' => 'draft']);

        $response = $this->postJson('/api/invoice/approve', ['id' => $invoice->id]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Success']);

        $this->assertDatabaseHas('invoices', ['id' => $invoice->id, 'status' => 'approved']);
    }

    /**
     * Test reject an invoice.
     *
     * @return void
     */
    public function testRejectInvoice(): void
    {
        $invoice = InvoiceModel::factory()->create(['status' => 'draft']);

        $response = $this->postJson('/api/invoice/reject', ['id' => $invoice->id]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Success']);

        $this->assertDatabaseHas('invoices', ['id' => $invoice->id, 'status' => 'rejected']);
    }

    /**
     * Test show an invoice.
     *
     * @return void
     */
    public function testShowInvoice(): void
    {
        $invoice = InvoiceModel::factory()->create();

        $response = $this->getJson("/api/invoice/show/{$invoice->id}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'invoice_id',
                    'invoice_number',
                    'invoice_date',
                    'due_date',
                    'status',
                    'company' => [
                        'name',
                        'street_address',
                        'city',
                        'zip_code',
                        'phone',
                        'email_address',
                    ],
                    'products',
                ],
                'message',
                'status',
            ]);
    }

    /**
     * Test validate id throws exception
     *
     * @return void
     */
    public function testValidateIdThrowsException(): void
    {
        $response = $this->getJson("/api/invoices/''");
        $response->assertStatus(404);
    }
}
