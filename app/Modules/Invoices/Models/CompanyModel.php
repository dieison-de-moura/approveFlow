<?php

namespace App\Modules\Invoices\Models;

use App\Modules\Invoices\Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CompanyModel extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'id',
        'name',
        'street',
        'city',
        'zip',
        'phone',
        'email',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected static function newFactory(): CompanyFactory
    {
        return CompanyFactory::new();
    }
}
