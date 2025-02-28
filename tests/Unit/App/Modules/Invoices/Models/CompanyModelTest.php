<?php

namespace Tests\Unit\App\Modules\Invoices\Models;

use App\Modules\Invoices\Models\CompanyModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyModelTest extends AbstractModelTestCase
{
    protected function model(): CompanyModel
    {
        return new CompanyModel();
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
            'name',
            'street',
            'city',
            'zip',
            'phone',
            'email',
        ];
    }

    protected function casts(): array
    {
        return [
            'id' => 'string',
        ];
    }
}
