<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use App\Modules\Approval\Contracts\ApprovalInterface;
use App\Modules\Approval\Dto\ApprovalDto;
use Illuminate\Support\Facades\Facade;

/**
 * @method static true approve(ApprovalDto $approvalDto)
 * @method static true reject(ApprovalDto $approvalDto)
 *
 * @see ApprovalInterface
 */
class ApprovalFacade extends Facade
{
    /**
     * Retorna o nome do service container para a facade.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return ApprovalInterface::class;
    }
}
