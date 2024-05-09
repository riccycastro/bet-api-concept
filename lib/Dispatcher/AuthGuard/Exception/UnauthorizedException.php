<?php

declare(strict_types=1);

namespace Lib\Dispatcher\AuthGuard\Exception;

use Lib\Exception\HttpException;
use Lib\Exception\Throwable;

final class UnauthorizedException extends HttpException
{
    public function __construct()
    {
        parent::__construct(401, 'Unauthorized');
    }
}
