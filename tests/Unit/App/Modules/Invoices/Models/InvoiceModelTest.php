<?php

namespace Tests\Unit\App\Modules\Invoices\Models;

use App\Modules\Invoices\Models\InvoiceModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceModelTest extends AbstractModelTestCase
{
    protected function model(): InvoiceModel
    {
        return new InvoiceModel();
    }

    protected function traits(): array
    {
        return [
            HasFactory::class,
        ];
    }

    protected function fillables(): array
    {
        return [
            'id',
            'number',
            'date',
            'due_date',
            'company_id',
            'status',
        ];
    }

    protected function casts(): array
    {
        return [
            'id' => 'string',
        ];
    }
}
