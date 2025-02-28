<?php

namespace Tests\Unit\App\Modules\Invoices\Models;

use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

abstract class AbstractModelTestCase extends TestCase
{
    abstract protected function model(): Model;

    abstract protected function traits(): array;

    abstract protected function fillables(): array;

    abstract protected function casts(): array;

    public function testIfUseTraits()
    {
        $traitsNeed = $this->traits();

        $traitsUsed = array_keys(class_uses($this->model()));

        $this->assertEquals($traitsNeed, $traitsUsed);
    }

    public function testFillables()
    {
        $expected = $this->fillables();

        $fillable = $this->model()->getFillable();

        $this->assertEquals($expected, $fillable);
    }

    public function testIncrementingIsFalse()
    {
        $model = $this->model();

        $this->assertFalse($model->incrementing);
    }

    public function testHasCasts()
    {
        $excepectedCasts = $this->casts();

        $casts = $this->model()->getCasts();

        $this->assertEquals($excepectedCasts, $casts);
    }
}
